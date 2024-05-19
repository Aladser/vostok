export const fadeOut = (el, speed = 300) => {
  el.style.opacity = 0
  el.style.transition = `opacity ${speed}ms`

  setTimeout(() => {
    el.style.display = 'none'
    el.style.opacity = ''
    el.style.transition = ''
  }, speed)
}