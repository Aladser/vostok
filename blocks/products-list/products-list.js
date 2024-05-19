import { Swiper } from 'swiper'
import { EffectFade } from 'swiper/modules'
import { updateNoticePosition } from './updateNoticePosition'

import './products-list.mustache'
import 'products-card/products-card.mustache'

export default () => {
  let resizeTimer

  const cards = document.querySelectorAll('.products-card')

  if (cards.length > 0) {
    initCards(cards)
  }

  window.addEventListener('resize', () => {
    if (resizeTimer) {
      clearTimeout(resizeTimer)
    }

    resizeTimer = setTimeout(updateNoticesPosition, 300)
  })

  function initCards(cards) {
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

    let slider = new Swiper(sliderEl, {
      modules: [ EffectFade ],
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

    sliderEl.swiperInstance = slider

    const navItems = Array.from(sliderEl.querySelectorAll('.products-card-nav-item'))
    navItems.forEach((el, index) => {
      el.addEventListener('mouseenter', () => slider.slideTo(index))
    })
  }

  function updateNoticesPosition() {
    const cards = document.querySelectorAll('.products-card')

    cards.forEach(card => updateCardNoticePosition(card))
  }

  function updateCardNoticePosition(card) {
    updateNoticePosition(card, {
      notice: '.products-card-notice',
      noticeTip: '.products-card-notice-tip',
      leftClass: 'products-card-notice-tip_pull-left',
      rightClass: 'products-card-notice-tip_pull-right'
    })
  }
}