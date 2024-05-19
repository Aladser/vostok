import './detail-share.mustache'

export default () => {
  const button = document.querySelector('.detail-share')
  let hiddenTimer

  if (button) {
    button.addEventListener('click', clickEventHandler)
  }

  function clickEventHandler() {
    button.classList.add('detail-share_show-tip')

    clearTimeout(hiddenTimer)
    hiddenTimer = setTimeout(() => {
      navigator.clipboard.writeText(document.location.href)
        .catch(error => console.log(error))
        .finally(() => button.classList.remove('detail-share_show-tip'))
    }, 2000)
  }
}