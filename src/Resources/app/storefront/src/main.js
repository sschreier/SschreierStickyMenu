const PluginManager = window.PluginManager;

PluginManager.register('SschreierStickyMenuPlugin', () => import('./sticky-menu-plugin/sticky-menu-plugin.plugin'), '[data-sticky-menu]');
