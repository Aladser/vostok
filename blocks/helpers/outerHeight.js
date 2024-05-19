export const outerHeight = (element, withMargin) => {
  if (element instanceof HTMLElement) {
    let height = element.clientHeight

    if (withMargin) {
      const marginTop = +window.getComputedStyle(element).marginTop.slice(0, -2)
      const marginBottom = +window.getComputedStyle(element).marginBottom.slice(0, -2)

      height += marginTop + marginBottom
    }

    return height
  }
  else {
    return 0
  }
}