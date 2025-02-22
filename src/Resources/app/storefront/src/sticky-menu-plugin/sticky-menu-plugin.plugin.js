import DomAccess from 'src/helper/dom-access.helper';
import ViewportDetection from 'src/helper/viewport-detection.helper';

export default class StickyMenuPlugin extends window.PluginBaseClass {
    static options = {
        cloneMainNavigationStickyClass: 'main-navigation-sticky',
        positionStickyMenuIsActive: 120,
        notActiveViewportsStickyMenu: "'XS', 'SM', 'MD'"
    }

    init() {
        this.PluginManager = window.PluginManager;

        this.subscribeViewportEvent();

        if (this.pluginShouldBeActive()) {
            this.initializePlugin();
        }
    }

    createElement(){
        this._mainNavigationClone = this.el.cloneNode(true);
        this._mainNavigationClone.classList.add(this.options.cloneMainNavigationStickyClass);

        DomAccess.querySelector(this._mainNavigationClone, '.main-navigation').removeAttribute('id');

        document.body.appendChild(this._mainNavigationClone);
    }

    addEventListener(){
        document.addEventListener('scroll', this.onScroll.bind(this));
    }

    removeEventListener(){
        document.removeEventListener('scroll', this.onScroll.bind(this));
    }

    onScroll(){
        const scrollPosition = document.documentElement.scrollTop;

        if (scrollPosition > this.options.positionStickyMenuIsActive) {
            if (!this._mainNavigationClone.classList.contains('is--active')) {
                this._mainNavigationClone.classList.add('is--active');
            }
        } else {
            this._mainNavigationClone.classList.remove('is--active');
        }
    }

    reinitializePlugin(){
        this.PluginManager.initializePlugin(
            'FlyoutMenu',
            '[data-flyout-menu="true"]',
            {}
        )
    }

    subscribeViewportEvent(){
        document.$emitter.subscribe('Viewport/hasChanged', this.update, { scope: this });
    }

    update(){
        if (this.pluginShouldBeActive()) {
            if (this.initialized) return;

            this.initializePlugin();
        } else {
            if (!this.initialized) return;

            this.destroy();
        }
    }

    pluginShouldBeActive() {
        return !(this.options.notActiveViewportsStickyMenu).includes(ViewportDetection.getCurrentViewport());
    }

    initializePlugin() {
        this.createElement();
        this.addEventListener();
        this.reinitializePlugin();

        this.initialized = true;
    }

    destroy(){
        this._mainNavigationClone.remove();

        this.removeEventListener();

        this.initialized = false;
    }
}
