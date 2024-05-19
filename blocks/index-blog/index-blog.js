import { Swiper } from 'swiper'
import { FreeMode } from 'swiper/modules'
import { InfiniteButton } from '../infinite-button/infinite-button'

import './index-blog.mustache'
import './index-blog-card.mustache'

export default () => {
    const mainEl = document.querySelector('.index-blog')

    if (mainEl) {
        if (needSlider()) {
            initSlider()
        }

        new InfiniteButton({
            selectors: {
                wrapper: '.index-blog-list',
                linkWrapper: '.infinite-button-wrap',
                link: '.infinite-button',
                linkText: '.infinite-button__text',
                item: '.index-blog-card',
            },
            classes: {
                linkActive: 'infinite-button_active'
            }
        })
    }

    function needSlider() {
        return mainEl.querySelectorAll('.index-blog-tab').length > 1
    }

    function initSlider() {
        const sliderEl = mainEl.querySelector('.index-blog-tabs')

        new Swiper(sliderEl, {
            modules: [ FreeMode ],
            freeMode: true,
            slidesPerView: 'auto',
            spaceBetween: 11
        })
    }
}