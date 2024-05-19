import {FeedbackForm} from "./FeedbackForm";
import {FormPlaceholder} from '../../form-placeholder/FormPlaceholder'
import {FormViewSwitcher} from "../../form-view-switcher/FormViewSwitcher";
import { fbInitAll } from '../../custom-fancybox/custom-fancybox'

import './templates'

import './feedback-form.sass'

window.FeedbackForm = FeedbackForm;

(function () {
  new FormPlaceholder()
  new FormViewSwitcher()

  // инициализация fancybox
  fbInitAll()

  // observer для инициализации отложенного запуска плагина форм
  if (window.initFeedback) {
    window.initFeedback.forEach(func => {
      if (func && typeof func === 'function') {
        func()
      }
    })
  }
})()




