import { Swiper } from 'swiper'
import { Navigation, Scrollbar } from 'swiper/modules'

import './index-reviews.mustache'

export default () => {
  const mainEl = document.querySelector('.index-reviews')

  if (mainEl) {
    if (needSlider()) {
      initSlider()
    }
  }

  function needSlider() {
    return mainEl.querySelectorAll('.index-reviews-slide').length > 1
  }

  function initSlider() {
    const sliderEl = mainEl.querySelector('.index-reviews-slider')

    new Swiper(sliderEl, {
      modules: [ Navigation, Scrollbar ],
      spaceBetween: 24,
      navigation: {
        prevEl: mainEl.querySelector('.index-reviews-slider__arrow_prev'),
        nextEl: mainEl.querySelector('.index-reviews-slider__arrow_next')
      },
      scrollbar: {
        el: mainEl.querySelector('.index-reviews-slider-scrollbar'),
        draggable: true,
        dragClass: 'slider-scrollbar-drag',
        dragSize: 156
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 16,
          scrollbar: {
            dragSize: 351
          }
        },
        1280: {
          slidesPerView: 3,
          spaceBetween: 24,
          allowTouchMove: false
        }
      }
    })
  }
}