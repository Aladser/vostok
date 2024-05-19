import { Swiper } from 'swiper'
import { Navigation, Pagination, Autoplay } from 'swiper/modules'

import './index-top.mustache'

export default () => {
  const mainEl = document.querySelector('.index-top')

  if (mainEl) {
    initSlider()
  }

  function initSlider() {
    const sliderEl = mainEl.querySelector('.index-top-slider')

    new Swiper(sliderEl, {
      loop: true,
      spaceBetween: 16,
      modules: [ Navigation, Pagination, Autoplay ],
      speed: 700,
      autoplay: {
        delay: 6000,
        disableOnInteraction: false,
        waitForTransition: false
      },
      navigation: {
        prevEl: mainEl.querySelector('.index-top-slider-arrow_prev'),
        nextEl: mainEl.querySelector('.index-top-slider-arrow_next'),
        disabledClass: 'slider-arrow_disabled',
        lockClass: 'slider-arrow_lock',
      },
      pagination: {
        el: '.index-top-slider-pagination',
        type: 'bullets',
        clickable: true,
        bulletClass: 'slider-dot',
        bulletActiveClass: 'slider-dot_active',
        lockClass: 'slider-dots_lock',
      },
      breakpoints: {
        1280: {
          allowTouchMove: false
        }
      }
    })
  }
}