import { Swiper } from 'swiper'
import { FreeMode } from 'swiper/modules'

import './news-list.mustache'

export default () => {
    const mainEl = document.querySelector('.news-list')

    if (mainEl) {
        if (needSlider()) {
            initSlider()
        }
    }

    function needSlider() {
        return mainEl.querySelectorAll('.news-list-tab').length > 1
    }

    function initSlider() {
        const sliderEl = mainEl.querySelector('.news-list-tabs')

        new Swiper(sliderEl, {
            slidesPerView: 'auto',
            spaceBetween: 11,
            modules: [ FreeMode ],
            freeMode: true
        })
    }
}