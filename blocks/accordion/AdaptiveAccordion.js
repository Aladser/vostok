import {Accordion} from "./Accordion"

/**
 * @class AdaptiveAccordion
 * @param {Number} breakpoint
 */
export class AdaptiveAccordion extends Accordion {
    init() {
        this.params._resizeTimer = 0;
        this.checkAccordion = this.checkAccordion.bind(this);

        super.init();

        if (this.params.breakpoint) {
            this.checkAccordion();
        }
    }

    attachEvents() {
        super.attachEvents();

        if (this.params.breakpoint) {
            window.addEventListener('resize', this.windowResizeHandler.bind(this))
        }
    }

    windowResizeHandler() {
        clearTimeout(this.params._resizeTimer)

        this.params._resizeTimer = setTimeout(this.checkAccordion, 250)
    }

    checkAccordion() {
        if (window.innerWidth >= this.params.breakpoint) {
            if (this.params._active) {
                super.destroy();
            }
        } else {
            if (!this.params._active) {
                this.params._active = true;

                super.checkDefault();
            }
        }
    }
}