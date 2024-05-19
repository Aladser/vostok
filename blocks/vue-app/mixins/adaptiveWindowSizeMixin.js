export const adaptiveWindowSizeMixin = {
  resizeTimer: undefined,
  data: () => ({
    isMobile: window.innerWidth < 768,
    isTablet: window.innerWidth >= 768 && window.innerWidth < 1280,
    isDesktop: window.innerWidth >= 1280,
  }),
  methods: {
    resizeHandler() {
      clearTimeout(this.resizeTimer)

      this.resizeTimer = setTimeout(() => {
        this.isMobile = window.innerWidth < 768
        this.isTablet = window.innerWidth >= 768 && window.innerWidth < 1280
        this.isDesktop = window.innerWidth >= 1280
      }, 250)
    },
  },
  mounted() {
    window.addEventListener('resize', this.resizeHandler)
  },
  destroyed() {
    window.addEventListener('resize', this.resizeHandler)
  }
}