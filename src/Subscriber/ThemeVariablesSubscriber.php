<?php
declare(strict_types=1);

namespace Sschreier\StickyMenu\Subscriber;

use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Theme\Event\ThemeCompilerEnrichScssVariablesEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Sschreier\StickyMenu\SschreierStickyMenu;

class ThemeVariablesSubscriber implements EventSubscriberInterface
{
    private SystemConfigService $systemConfig;

    public function __construct(SystemConfigService $systemConfig)
    {
        $this->systemConfig = $systemConfig;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ThemeCompilerEnrichScssVariablesEvent::class => 'onAddVariables',
        ];
    }

    public function onAddVariables(ThemeCompilerEnrichScssVariablesEvent $event): void
    {
        $configFields = $this->systemConfig->get('SschreierStickyMenu.config', $event->getSalesChannelId());

        foreach($configFields as $configKey => $value) {
            // convert `customVariableName` to `custom-variable-name`
            $kebabCasedScssVariable = str_replace('_', '-', (new CamelCaseToSnakeCaseNameConverter())->normalize($configKey));

            if($value && in_array($configKey, SschreierStickyMenu::PLUGIN_CONFIG_VARS)) {
                $event->addVariable(
                    'sschreier-' . $kebabCasedScssVariable,
                    (string) $value
                );
            }
        }
    }
}
