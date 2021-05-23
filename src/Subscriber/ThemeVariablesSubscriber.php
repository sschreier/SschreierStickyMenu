<?php
    namespace sschreier\Stickymenu\Subscriber;

    use Symfony\Component\EventDispatcher\EventSubscriberInterface;
    use Shopware\Storefront\Event\ThemeCompilerEnrichScssVariablesEvent;
    use Shopware\Core\System\SystemConfig\SystemConfigService;

    class ThemeVariablesSubscriber implements EventSubscriberInterface {
        /**
         * @var SystemConfigService
        */
        protected $systemConfig;

        public function __construct(SystemConfigService $systemConfig) {
            $this->systemConfig = $systemConfig;
        }

        public static function getSubscribedEvents(): array {
            return [
                ThemeCompilerEnrichScssVariablesEvent::class => 'onAddVariables'
            ];
        }

        public function onAddVariables(ThemeCompilerEnrichScssVariablesEvent $event) {
            $backgroundcolorstickymenu = $this->systemConfig->get('sschreierStickymenu.config.backgroundColorStickyMenu', $event->getSalesChannelId());
            $zindexstickymenu = $this->systemConfig->get('sschreierStickymenu.config.zIndexStickyMenu', $event->getSalesChannelId());
            $transitiondurationstickymenu = $this->systemConfig->get('sschreierStickymenu.config.transitionDurationStickyMenu', $event->getSalesChannelId());
            $boxshadowstickymenu = $this->systemConfig->get('sschreierStickymenu.config.boxShadowStickyMenu', $event->getSalesChannelId());

            if(is_null($backgroundcolorstickymenu)){
                $backgroundcolorstickymenu = "#ffffff";
            }

            if(is_null($zindexstickymenu)){
                $zindexstickymenu = "1000";
            }

            if(is_null($transitiondurationstickymenu)){
                $transitiondurationstickymenu = "400";
            }

            if(is_null($boxshadowstickymenu)){
                $boxshadowstickymenu = "5px 0 5px rgba(0, 0, 0, 0.5)";
            }

            $event->addVariable('sschreier-backgroundcolor-stickymenu', $backgroundcolorstickymenu);
            $event->addVariable('sschreier-zindex-stickymenu', $zindexstickymenu);
            $event->addVariable('sschreier-transition-duration-stickymenu', $transitiondurationstickymenu);
            $event->addVariable('sschreier-boxshadow-stickymenu', $boxshadowstickymenu);
        }
    }