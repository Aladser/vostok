import {fadeOut} from "../helpers/fadeOut";

export default () => {
  const alert = document.querySelector('.cookie-alert')

  if (alert) {
    const closeButton = alert.querySelector('.cookie-alert__button')

    if (closeButton) {
      closeButton.addEventListener('click', closeClickHandler)
    }
  }

  function closeClickHandler() {
    fadeOut(alert)

    document.cookie = 'alertCookie=y; path=/; max-age=' + 3600 * 24 * 30
  }
}
