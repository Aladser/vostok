import {Fancybox} from "@fancyapps/ui"
import '@fancyapps/ui/dist/fancybox.css'

window.Fancybox = Fancybox

export const fbInit = () => {
  Fancybox.bind("[data-fancybox]", {
    mainClass: "custom-fancybox",
    dragToClose: false,
    trapFocus: false,
    autoFocus: false
  });
}

export const fbForms = () => {
  Fancybox.bind('.modal-form-link', {
    mainClass: 'form-fancybox',
    dragToClose: false,
    closeButton: false,
    trapFocus: false,
    autoFocus: false,
    defaultType: 'html',
    on: {
      reveal(fancybox, {$content, $trigger}) {
        const productId = $trigger.dataset.productId

        if (productId) {
          const productField = $content.querySelector('input[name="AUTO"]')

          if (productField) {
            productField.value = productId
          }
        }
      }
    }
  })
}

export const fbCLickCloseHandler = () => {
  document.addEventListener('click', event => {
    let close = event.target.closest('[data-fancybox-close]')

    if (close) Fancybox.close()
  })
}

export const fbInitAll = () => {
  fbInit()
  fbForms()
  fbCLickCloseHandler()
}