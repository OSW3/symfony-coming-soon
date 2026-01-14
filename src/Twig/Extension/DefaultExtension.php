<?php 
namespace OSW3\ComingSoon\Twig\Extension;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use OSW3\ComingSoon\Twig\Runtime\DefaultExtensionRuntime;

class DefaultExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction("coming_soon__template", [DefaultExtensionRuntime::class, 'getTemplate']),
            new TwigFunction("coming_soon__lang", [DefaultExtensionRuntime::class, 'getLang']),
            new TwigFunction("coming_soon__charset", [DefaultExtensionRuntime::class, 'getCharset']),
            new TwigFunction("coming_soon__favicon", [DefaultExtensionRuntime::class, 'getFavicon']),
            new TwigFunction("coming_soon__has_favicon", [DefaultExtensionRuntime::class, 'hasFavicon']),
            new TwigFunction("coming_soon__banner", [DefaultExtensionRuntime::class, 'getBanner']),
            new TwigFunction("coming_soon__storage_type", [DefaultExtensionRuntime::class, 'getStorageType']),
            new TwigFunction("coming_soon__storage_file", [DefaultExtensionRuntime::class, 'getStorageFile']),
            new TwigFunction("coming_soon__autofocus", [DefaultExtensionRuntime::class, 'isAutofocus']),
            
            new TwigFunction("coming_soon__name", [DefaultExtensionRuntime::class, 'getName']),
            new TwigFunction("coming_soon__description", [DefaultExtensionRuntime::class, 'getDescription']),
            new TwigFunction("coming_soon__has_description", [DefaultExtensionRuntime::class, 'hasDescription']),
            new TwigFunction("coming_soon__content", [DefaultExtensionRuntime::class, 'getContent']),
            new TwigFunction("coming_soon__email", [DefaultExtensionRuntime::class, 'getEmail']),
            new TwigFunction("coming_soon__already_subscribed", [DefaultExtensionRuntime::class, 'getAlreadySubscribed']),
            new TwigFunction("coming_soon__submit", [DefaultExtensionRuntime::class, 'getSubmit']),
            new TwigFunction("coming_soon__sending", [DefaultExtensionRuntime::class, 'getSending']),
            new TwigFunction("coming_soon__success", [DefaultExtensionRuntime::class, 'getSuccess']),
            new TwigFunction("coming_soon__error", [DefaultExtensionRuntime::class, 'getError']),

            new TwigFunction("coming_soon__links", [DefaultExtensionRuntime::class, 'getLinks']),
            new TwigFunction("coming_soon__google_analytics", [DefaultExtensionRuntime::class, 'getGoogleAnalytics']),
        ];
    }
}
