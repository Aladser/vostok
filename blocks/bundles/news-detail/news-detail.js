import productsSlider from 'products-slider/products-slider'
import article from '../../article/article'

import './templates'

import 'swiper/css'
import 'swiper/css/effect-fade'
import 'swiper/css/navigation'
import 'swiper/css/scrollbar'
import 'swiper/css/thumbs'

import './news-detail.sass'

document.addEventListener('DOMContentLoaded', () => {
  article()

  const productsSliders = Array.from(document.querySelectorAll('.products-slider'))

  productsSliders.forEach(sliderEl => productsSlider(sliderEl, {
    sliderOptions: {
      breakpoints: {
        768: {
          slidesPerView: 'auto',
          spaceBetween: 22,
        },
        1280: {
          slidesPerView: 'auto',
          spaceBetween: 16,
          slidesOffsetAfter: 24
        },
      },
    },
    noticeOptions: {
      viewAreaEl: sliderEl.querySelector('.products-slider-slides')
    }
  }))
});