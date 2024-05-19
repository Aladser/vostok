import './templates'

import indexTop from 'index-top/index-top'
import productsList from 'products-list/products-list'
import indexReviews from 'index-reviews/index-reviews'
import indexFaq from '../../index-faq/index-faq'
import indexBlog from '../../index-blog/index-blog'

import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import 'swiper/css/scrollbar'
import 'swiper/css/effect-fade'
import 'swiper/css/free-mode'

import './homepage.sass'

document.addEventListener('DOMContentLoaded', () => {
    window.initProductsList = () => productsList()
    window.initProductsList()
    indexTop()
    indexFaq()
    indexReviews()
    indexBlog()
})