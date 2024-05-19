import { Swiper } from 'swiper'
import { Navigation, Thumbs } from 'swiper/modules'

import './detail-gallery.mustache'

export default () => {
  const galleryEl = document.querySelector('.detail-gallery')
  let thumbsInstance, sliderInstance

  if (galleryEl) {
    if (needSlider()) {
      initThumbs()
      initSlider()
    }
  }

  function needSlider() {
    const slidesEl = document.querySelectorAll('.detail-gallery-slide')
    return slidesEl.length > 1
  }

  function initThumbs() {
    const thumbsEl = document.querySelector('.detail-gallery-thumbs-slider')

    if (thumbsEl) {
      thumbsInstance = new Swiper(thumbsEl, {
        modules: [ Navigation ],
        slidesPerView: 4,
        spaceBetween: 7,
        watchOverflow: true,
        navigation: {
          prevEl: thumbsEl.parentElement.querySelector('.detail-gallery-thumbs-arrow_prev'),
          nextEl: thumbsEl.parentElement.querySelector('.detail-gallery-thumbs-arrow_next'),
        },
        breakpoints: {
          768: {
            spaceBetween: 12
          }
        }
      })
    }
  }

  function initSlider() {
    const sliderEl = document.querySelector('.detail-gallery-slider')

    if (sliderEl) {
      sliderInstance = new Swiper(sliderEl, {
        modules: [ Thumbs ],
        spaceBetween: 16,
        watchOverflow: true,
        thumbs: {
          swiper: thumbsInstance
        }
      })
    }
  }

}