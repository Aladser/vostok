import productsList from 'products-list/products-list'

import 'swiper/css'
import 'swiper/css/effect-fade'
import 'swiper/css/scrollbar'

import './catalog.sass'

document.addEventListener('DOMContentLoaded', () => {
  window.initProductsList = () => productsList()
  window.initProductsList()
})