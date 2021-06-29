<?php 
declare(strict_types=1);

namespace Sschreier\StickyMenu;

use Shopware\Core\Framework\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class SschreierStickyMenu extends Plugin 
{
	/* plugin variables match: config key => scss variable */
    const PLUGIN_VARS = [
        'backgroundColorStickyMenu' => 'sschreier-stickymenu-backgroundcolor',
        'zIndexStickyMenu' => 'sschreier-stickymenu-zindex',
        'transitionDurationStickyMenu' => 'sschreier-stickymenu-transition-duration',
        'boxShadowStickyMenu' => 'sschreier-stickymenu-boxshadow',
    ];

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->setParameter(
            'sschreier_stickymenu_domain',
            $this->getName() . '.config.'
        );
    }
}
