export const isDesktop = () => {
  return window.innerWidth >= 1280
}

export const isMobile = () => {
  return window.innerWidth < 768
}

export const isMobileOrTablet = () => {
  return window.innerWidth < 1280
}
