<?php 
namespace OSW3\ComingSoon\Service;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final class ComingSoonService
{
    public function __construct(
        #[Autowire('%kernel.project_dir%')] private string $projectDir, 
        private ParameterBagInterface $params
    ){}

    private function getConfig(): array
    {
        return $this->params->get('coming_soon');
    }

    /**
     * Get the template for the coming soon page.
     * 
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->getConfig()['template'];
    }

    /** 
     * Get the language of the project or website.
     * 
     * @return string
     */
    public function getLang(): string
    {
        return $this->getConfig()['lang'];
    }

    /** 
     * Get the character set for the coming soon page.
     * 
     * @return string
     */
    public function getCharset(): string
    {
        return $this->getConfig()['charset'];
    }

    /**
     * Get the favicon image for the coming soon page.
     * 
     * @return string|null
     */
    public function getFavicon(): ?string
    {
        return $this->getConfig()['favicon'];
    }

    /**
     * Get the logo URL or path.
     * 
     * @return string|null
     */
    public function getBanner(): ?string
    {
        return $this->getConfig()['banner'];
    }

    /**
     * Get the autofocus setting for the form input.
     * 
     * @return bool
     */
    public function isAutofocus(): bool
    {
        return $this->getConfig()['autofocus'];
    }


    // -- STORAGE

    /**
     * Get the storage method for form data.
     * 
     * @return string
     */
    public function getStorageType(): string
    {
        return $this->getConfig()['storage']['type'];
    }

    /**
     * Get the storage file path for form data.
     * 
     * @return string
     */
    public function getStorageFile(): string
    {
        return $this->getConfig()['storage']['file'];
    }


    // -- LABELS

    /** 
     * Get the name of the project or website.
     * 
     * @return string
     */
    public function getName(): string
    {
        $name = $this->getConfig()['labels']['name'];

        if ($name === null) {
            $composerJson = file_get_contents($this->projectDir . '/composer.json');
            $data = json_decode($composerJson, true);
            $name = $data['name'] ?? null;
        }

        if ($name === null) {
            $name = 'My Awesome Project';
        }

        return $name;
    }

    /**
     * Get the description of the project or website.
     * 
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->getConfig()['labels']['description'];
    }

    /**
     * Get the main content for the coming soon page.
     * 
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->getConfig()['labels']['content'];
    }

    /**
     * Get the email placeholder text for the form input.
     * 
     * @return string
     */
    public function getEmail(): string
    {
        return $this->getConfig()['labels']['email'];
    }

    /**
     * Get the already subscribed message for the form.
     * 
     * @return string
     */
    public function getAlreadySubscribed(): string
    {
        return $this->getConfig()['labels']['already_subscribed'];
    }

    /**
     * Get the submit button label for the form.
     * 
     * @return string
     */
    public function getSubmit(): string
    {
        return $this->getConfig()['labels']['submit'];
    }

    /**
     * Get the sending label for the form.
     * 
     * @return string
     */
    public function getSending(): string
    {
        return $this->getConfig()['labels']['sending'];
    }
    
    /**
     * Get the success message for the form submission.
     * 
     * @return string
     */
    public function getSuccess(): string
    {
        return $this->getConfig()['labels']['success'];
    }
    
    /**
     * Get the error message for the form submission.
     * 
     * @return string
     */
    public function getError(): string
    {
        return $this->getConfig()['labels']['error'];
    }


    // -- SOCIAL LINKS

    /**
     * Get the social links configuration.
     * 
     * @return array
     */
    public function getLinks(): array
    {
        $links = $this->getConfig()['links'] ?? [];
        
        return array_map(function($link) {
            return [
                'label' => strtolower($link['label']),
                'icon' => $link['icon'],
                'url' => $link['url'],
            ];
        }, $links);
    }


    // -- METRICS

    /**
     * Get the Google Analytics Tracking ID.
     * 
     * @return string|null
     */
    public function getGoogleAnalytics(): ?string
    {
        return $this->getConfig()['metrics']['google_analytics'] ?? null;
    }
}