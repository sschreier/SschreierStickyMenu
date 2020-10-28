import StickyMenuPlugin from './sticky-menu-plugin/sticky-menu-plugin.plugin';

// register them via the existing PluginManager
const PluginManager = window.PluginManager;

PluginManager.register('StickyMenuPlugin', StickyMenuPlugin, '[data-sticky-menu]', {
    positionStickyMenuIsActive: 120,
    notActiveViewportsStickyMenu: "'XS', 'SM', 'MD'"
});