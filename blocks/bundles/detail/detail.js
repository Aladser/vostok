import detailTop from 'detail-top/detail-top'
import detailTabs from 'detail-tabs/detail-tabs'
import productsSlider from 'products-slider/products-slider'
import indexFaq from '../../index-faq/index-faq'

import './templates'

import 'swiper/css'
import 'swiper/css/effect-fade'
import 'swiper/css/navigation'
import 'swiper/css/scrollbar'
import 'swiper/css/thumbs'

import './detail.sass'

document.addEventListener('DOMContentLoaded', () => {
  detailTop({ tabsInstance: detailTabs() })
  indexFaq()

  const productsSliders = Array.from(document.querySelectorAll('.products-slider'))
  productsSliders.forEach(sliderEl => productsSlider(sliderEl))
})