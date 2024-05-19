export const outerWidth = (element, withMargin) => {
  if (element instanceof HTMLElement) {
    let width = element.clientWidth

    if (withMargin) {
      const marginLeft = +window.getComputedStyle(element).marginLeft.slice(0, -2)
      const marginRight = +window.getComputedStyle(element).marginRight.slice(0, -2)

      width += marginLeft + marginRight
    }

    return width
  } else {
    return 0
  }
}
