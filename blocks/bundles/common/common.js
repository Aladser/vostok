import { Header } from 'header/header'
import 'footer/footer'
import lozad from 'lozad'
import 'fonts/stylesheet.css'

import './templates'

import cookieAlert from 'cookie-alert/cookie-alert'

import './common.sass'

window._ = {
  merge: require('lodash/merge'),
}

window.observer = lozad('.lozad', {
  loaded: function (el) {
    el.classList.add('loaded')
  }
})

window.observer.observe()

document.addEventListener('DOMContentLoaded', () => {
  setCssVariables()
  new Header()
  cookieAlert()
})

function setCssVariables() {
  const scrollbarWidth = window.innerWidth - document.body.clientWidth
  document.body.style.setProperty('--scrollbar-width', scrollbarWidth + 'px')
}