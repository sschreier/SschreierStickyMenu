import ViewportDetection from 'src/helper/viewport-detection.helper';
const { PluginBaseClass } = window;

export default class SschreierStickyMenuPlugin extends PluginBaseClass {
    static options = {
        notActiveViewportsStickyMenu: "'XS', 'SM', 'MD'",
        positionStickyMenuIsActive: 120,
        stickyClass: 'nav-main-sticky'
    }

    init() {
        this.subscribeViewportEvent();

        if (this.pluginShouldBeActive()) {
            this.initializePlugin();
        }
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
        this.addEventListener();

        this.initialized = true;
    }

    addEventListener(){
        document.addEventListener('scroll', this.onScroll.bind(this));
    }

    removeEventListener(){
        document.removeEventListener('scroll', this.onScroll.bind(this));
    }

    onScroll(){
        const navMain = document.querySelector('.nav-main'),
            scrollPosition = document.documentElement.scrollTop;

        if (scrollPosition > this.options.positionStickyMenuIsActive) {
            if (!navMain.classList.contains(this.options.stickyClass)) {
                navMain.classList.add(this.options.stickyClass);
            }
        } else {
            navMain.classList.remove(this.options.stickyClass);
        }
    }

    destroy(){
        this.removeEventListener();

        this.initialized = false;
    }
}
