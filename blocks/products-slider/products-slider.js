import { Swiper } from 'swiper'
import { Scrollbar, Navigation, EffectFade } from 'swiper/modules'

import './products-slider.mustache'
import 'products-card/products-card-slide.mustache'
import { updateNoticePosition } from "../products-list/updateNoticePosition";

export default (element, { sliderOptions, noticeOptions } = {}) => {
  let sliderEl, resizeTimer

  if (element && element instanceof HTMLElement) {
    sliderEl = element
  } else {
    sliderEl = document.querySelector('.products-slider')
  }

  if (sliderEl) {
    initListSlider()
    initCards()
    attachEvents()
  }

  function initListSlider() {
    const sliderParams = {
      modules: [ Scrollbar, Navigation ],
      slidesPerView: 'auto',
      navigation: {
        prevEl: sliderEl.querySelector('.products-slider-arrow_prev'),
        nextEl: sliderEl.querySelector('.products-slider-arrow_next')
      },
      scrollbar: {
        el: sliderEl.querySelector('.products-slider-scrollbar'),
        draggable: true,
        dragClass: 'slider-scrollbar-drag',
        dragSize: 156
      },
      breakpoints: {
        768: {
          slidesPerView: 3,
          spaceBetween: 16
        },
        1280: {
          slidesPerView: 4,
          spaceBetween: 24
        },
      },
      on: {
        slideChangeTransitionEnd() {
          updateNoticesPosition()
        }
      }
    }
    _.merge(sliderParams, sliderOptions)

    new Swiper(sliderEl.querySelector('.products-slider-slides'), sliderParams)
  }

  function attachEvents() {
    window.addEventListener('resize', () => {
      if (resizeTimer) {
        clearTimeout(resizeTimer)
      }

      resizeTimer = setTimeout(updateNoticesPosition, 300)
    })
  }

  function initCards() {
    const cards = Array.from(sliderEl.querySelectorAll('.products-card-slide'))
    cards.forEach(card => initCard(card))
  }

  function initCard(card) {
    const sliderEl = card.querySelector('.products-card-images')

    if (sliderEl && !sliderEl.swiperInstance) {
      initSlider(sliderEl)
    }

    updateCardNoticePosition(card)
  }

  function initSlider(sliderEl) {
    const progressValue = sliderEl.querySelector('.products-card-progress__value')
    const slider = new Swiper(sliderEl, {
      modules: [EffectFade],
      nested: true,
      effect: 'fade',
      breakpoints: {
        1280: {
          allowTouchMove: false
        }
      },
      on: {
        slideChange(swiper) {
          const percent = (swiper.realIndex + 1) / swiper.slides.length
          progressValue.style.transform = `scaleX(${percent})`
        }
      }
    })

    const navItems = Array.from(sliderEl.querySelectorAll('.products-card-nav-item'))
    navItems.forEach((el, index) => {
      el.addEventListener('mouseenter', () => slider.slideTo(index))
    })
  }

  function updateNoticesPosition() {
    const cards = sliderEl.querySelectorAll('.products-card')

    cards.forEach(card => updateCardNoticePosition(card))
  }

  function updateCardNoticePosition(card) {
    updateNoticePosition(card, {
      notice: '.products-card-notice',
      noticeTip: '.products-card-notice-tip',
      leftClass: 'products-card-notice-tip_pull-left',
      rightClass: 'products-card-notice-tip_pull-right',
      viewAreaEl: noticeOptions?.viewAreaEl ? noticeOptions.viewAreaEl : undefined
    })
  }
}