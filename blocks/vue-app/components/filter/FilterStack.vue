<template>
  <div class="filter-stack-wrapper">
    <div class="filter-stack swiper" ref="slider">
      <div class="swiper-wrapper">
        <div class="filter-stack-item swiper-slide" v-for="item in stack" :key="`stack-${item.controlId}-${item.valueId}`">
          <button class="filter-stack-button" type="button" @click="removeItem(item)">
            <span class="filter-stack-button__text">{{item.title}}</span>
            <span class="filter-stack-button__icon">
              <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 1.454 8.993.441 5 4.458 1.007.44 0 1.454l3.993 4.017L0 9.488 1.007 10.5 5 6.484l3.993 4.017L10 9.488 6.007 5.47 10 1.454Z" fill="#151313" fill-opacity="0.6"/></svg>
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'FilterStack',
  data: () => ({
    swiperObj: null
  }),
  props: {
    stack: {type: Array, default: () => []},
    removeItem: Function,
  },
  methods: {
    resetSwiper() {
      if (this.$refs.slider) {
        this.destroySwiper()

        this.swiperObj = new Swiper(this.$refs.slider,{
          slidesPerView: 'auto',
          spaceBetween: 18
        })
      }
    },
    destroySwiper() {
      if (this.swiperObj) {
        this.swiperObj.destroy()
        this.swiperObj = null
      }
    }
  },
  mounted() {
    this.resetSwiper()
  },
  updated() {
    this.resetSwiper()
  },
  destroyed() {
    this.destroySwiper()
  }
}
</script>

<style lang="sass">
@import '../../../variables/variables'
@import '../../../mixins/mixins'

.filter-stack-wrapper
  margin: 25px 0 0
  width: 100%
  min-width: 0
  min-height: 16px

.filter-stack
  overflow: visible

.filter-stack-item
  width: auto

.filter-stack-button
  font-weight: 500
  font-size: 12px
  line-height: 16px
  color: $main-color60
  display: flex
  align-items: center

.filter-stack-button__icon
  width: 10px
  height: 10px
  margin-left: 6px
  +svg

</style>