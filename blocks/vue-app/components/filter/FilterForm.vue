<template>
  <form class="filter-form" method="post" @submit.prevent="">
    <div class="container filter-container scrollbar">
      <div class="filter-list">
        <FilterGroup
          v-for="(control, index) in controls"
          :key="control.id"
          :index="index"
          :control="control"
          :control-change-handler="controlChangeHandler"/>
      </div>
    </div>
    <transition appear name="fade" v-if="loading">
      <div class="filter-overlay"></div>
    </transition>
  </form>
</template>

<script>
import FilterGroup from './FilterGroup'
import { Swiper } from 'swiper'
import { FreeMode, Scrollbar } from 'swiper/modules'
import { isDesktop } from 'helpers/responsiveChecks'

export default {
  name: 'FilterForm',
  components: {FilterGroup,},
  data: () => ({
    resizeTimer: null,
  }),
  props: {
    loading: Boolean,
    controls: {type: Array, default: true},
    controlChangeHandler: Function,

    isDesktop: Boolean,
  },
  methods: {
    initCheckboxSliders() {
      const checkboxListSliders = Array.from(this.$el.querySelectorAll('.checkbox-list-slider'))

      checkboxListSliders.forEach(sliderEl => {
        new Swiper(sliderEl, {
          modules: [ FreeMode, Scrollbar ]
        })
      })
    }
  },
  mounted() {
    this.$nextTick(() => {
      if (isDesktop()) {
        this.initCheckboxSliders()
      }
    })
  }
}
</script>

<style lang="sass">
@import '../../../variables/variables'
@import '../../../mixins/mixins'

.filter-form
  position: relative
  z-index: 0
  padding-top: 17px
  height: 100%

.filter-container
  padding-bottom: 30px
  height: 100%
  overflow: hidden auto

.filter-list-inner
  height: 100%
  overflow: hidden
  overflow-y: auto

.accordion-item_expand .accordion-trigger__icon
  transform: rotate(-180deg)

.accordion-trigger
  display: flex
  align-items: center
  justify-content: space-between
  width: 100%
  font-size: 15px
  font-weight: 600
  text-align: left

.accordion-trigger__icon
  width: 24px
  height: 24px
  padding: 5px
  transition: $default-transition
  +svg

.filter-overlay
  position: absolute
  top: -24px
  left: -10px
  right: -10px
  bottom: -10px
  backdrop-filter: blur(3px)
  z-index: 10

+mq(tablet)
  .filter-container
    overflow: visible
    +disable-container

  .filter-list
    display: grid
    grid-template-columns: 1fr 1fr 1fr
    grid-gap: 22px 16px

+mq(desktop)
  .filter-form
    padding-top: 0

  .filter-list
    padding: 0
    grid-template-columns: repeat(4, 1fr)
    grid-gap: 16px 24px

  .accordion-trigger .accordion-trigger__icon path
    transition: $default-transition

  .accordion-trigger:hover .accordion-trigger__icon path
    fill-opacity: 1

</style>