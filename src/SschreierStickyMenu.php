<?php
declare(strict_types=1);

namespace Sschreier\StickyMenu;

use Shopware\Core\Framework\Plugin;

class SschreierStickyMenu extends Plugin
{
    const PLUGIN_CONFIG_VARS = [
        'zIndexStickyMenu',
        'transitionDurationStickyMenu',
        'boxShadowStickyMenu'
    ];
}
