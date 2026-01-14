<?php 
namespace OSW3\ComingSoon\Twig\Runtime;

use OSW3\ComingSoon\Service\ComingSoonService;
use Twig\Extension\RuntimeExtensionInterface;

class DefaultExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct(
        private ComingSoonService $comingSoonService,
    ){}

    /**
     * Get the template for the coming soon page.
     * 
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->comingSoonService->getTemplate();
    }

    /** 
     * Get the language of the project or website.
     * 
     * @return string
     */
    public function getLang(): string
    {
        return $this->comingSoonService->getLang();
    }

    /** 
     * Get the character set for the coming soon page.
     * 
     * @return string
     */
    public function getCharset(): string
    {
        return $this->comingSoonService->getCharset();
    }

    /** 
     * Get the favicon image for the coming soon page.
     * 
     * @return string|null
     */
    public function getFavicon(): ?string
    {
        return $this->comingSoonService->getFavicon();
    }
    public function hasFavicon(): bool
    {
        return $this->getFavicon() !== null;
    }

    /** 
     * Get the banner image for the coming soon page.
     * 
     * @return string|null
     */
    public function getBanner(): ?string
    {
        return $this->comingSoonService->getBanner();
    }

    public function isAutofocus(): bool
    {
        return $this->comingSoonService->isAutofocus();
    }


    // -- STORAGE

    /** 
     * Get the storage type for form data.
     * 
     * @return string
     */
    public function getStorageType(): string
    {
        return $this->comingSoonService->getStorageType();
    }

    /** 
     * Get the storage file path for form data.
     * 
     * @return string|null
     */
    public function getStorageFile(): ?string
    {
        return $this->comingSoonService->getStorageFile();
    }


    // -- LABELS

    /** 
     * Get the name of the project or website.
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->comingSoonService->getName();
    }

    /** 
     * Get the description of the project or website.
     * 
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->comingSoonService->getDescription();
    }
    public function hasDescription(): bool
    {
        return $this->getDescription() !== null;
    }

    /** 
     * Get the content of the coming soon page.
     * 
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->comingSoonService->getContent();
    }

    /** 
     * Get the email input placeholder text for the form.
     * 
     * @return string
     */
    public function getEmail(): string
    {
        return $this->comingSoonService->getEmail();
    }

    /** 
     * Get the already subscribed message for the form.
     * 
     * @return string
     */
    public function getAlreadySubscribed(): string
    {
        return $this->comingSoonService->getAlreadySubscribed();
    }

    /** 
     * Get the submit button label for the form.
     * 
     * @return string
     */
    public function getSubmit(): string
    {
        return $this->comingSoonService->getSubmit();
    }

    /** 
     * Get the sending label for the form.
     * 
     * @return string
     */
    public function getSending(): string
    {
        return $this->comingSoonService->getSending();
    }

    /** 
     * Get the success message for the form.
     * 
     * @return string
     */
    public function getSuccess(): string
    {
        return $this->comingSoonService->getSuccess();
    }

    /** 
     * Get the error message for the form.
     * 
     * @return string
     */
    public function getError(): string
    {
        return $this->comingSoonService->getError();
    }


    // -- SOCIAL LINKS

    public function getLinks(): array
    {
        return $this->comingSoonService->getLinks();
    }


    // -- METRICS

    public function getGoogleAnalytics(): ?string
    {
        return $this->comingSoonService->getGoogleAnalytics();
    }
}