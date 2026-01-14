<?php 
namespace OSW3\ComingSoon\Controller;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use OSW3\ComingSoon\Service\ComingSoonService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ComingSoonController extends AbstractController
{
    public function __construct(
        private ComingSoonService $comingSoonService,
    ){}

    #[Route(path: "/", methods: ["GET"], name: "coming_soon_index")]
    public function index(CsrfTokenManagerInterface $csrfTokenManager): Response
    {
        $token = $csrfTokenManager->getToken('contact_form')->getValue();

        return $this->render($this->comingSoonService->getTemplate(), [
            'csrf_token' => $token,
            'year' => (new \DateTimeImmutable())->format('Y'),
        ]);
    }

    #[Route(path: "/", methods: ["POST"])]
    public function submit(
        Request $request,
        CsrfTokenManagerInterface $csrfTokenManager,
        Filesystem $filesystem
    ): JsonResponse
    {
        $projectDir = $this->getParameter('kernel.project_dir');

        // --- CSRF ---------------------------------------------------------------
        $token = new CsrfToken(
            'coming_soon_form',
            $request->request->get('_csrf_token')
        );

        if (!$csrfTokenManager->isTokenValid($token)) {
            return new JsonResponse([
                'success' => false,
                'message' => 'CSRF invalide'
            ], 403);
        }

        // --- Email --------------------------------------------------------------
        $email = trim((string) $request->request->get('email'));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Email invalide'
            ], 422);
        }

        // --- Storage ------------------------------------------------------------
        $relativePath = $this->comingSoonService->getStorageFile(); 
        // ex: 'var/storage/coming-soon/emails.csv'

        $file = $projectDir . '/' . ltrim($relativePath, '/');
        $dir  = dirname($file);

        // Création du répertoire si nécessaire
        if (!$filesystem->exists($dir)) {
            $filesystem->mkdir($dir, 0755);
        }

        $isNewFile = !$filesystem->exists($file);

        // --- CSV ---------------------------------------------------------------
        $fp = fopen($file, 'a');

        if ($fp === false) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Impossible d’écrire le fichier'
            ], 500);
        }

        // Lock fichier (anti race condition)
        flock($fp, LOCK_EX);

        if ($isNewFile) {
            fputcsv($fp, ['email', 'created_at', 'ip']);
        }

        fputcsv($fp, [
            $email,
            (new \DateTimeImmutable())->format('c'),
            $request->getClientIp()
        ]);

        flock($fp, LOCK_UN);
        fclose($fp);

        return new JsonResponse([
            'success' => true,
            'message' => $this->comingSoonService->getSuccess(),
        ]);
    }
}