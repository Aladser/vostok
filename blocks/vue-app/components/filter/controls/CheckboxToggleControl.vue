<template>
  <label class="filter-toggle" :class="cssClasses">
    <input
      type="checkbox"
      :checked="checked"
      :name="name"
      value="value"
      :disabled="disabled"
      class="form-hidden filter-toggle__control"
      ref="checkbox"
      @change="valueChangeHandler"/>
    <span class="filter-toggle__text" v-html="label"></span>
    <span class="filter-toggle__marker"></span>
  </label>
</template>

<script>
import {filterControlPropsMixin} from "../../../mixins/filterControlPropsMixin"

export default {
  name: 'CheckboxToggleControl',
  mixins: [filterControlPropsMixin],
  props: {
    isSlide: {
      type: Boolean,
      default: false
    },
    value: String,
    controlChangeHandler: Function,
  },
  computed: {
    cssClasses() {
      const classes = []

      if (this.disabled) {
        classes.push('filter-toggle_disabled')
      }

      if (this.isSlide) {
        classes.push('swiper-slide')
      }

      return classes
    }
  },
  methods: {
    valueChangeHandler(e) {
      this.controlChangeHandler({
        index: this.index,
        type: this.type,
        value: e.target.checked
      })
    }
  },
}
</script>

<style lang="sass">
@import '../../../../variables/variables'
@import '../../../../mixins/mixins'

.filter-toggle
  position: relative
  z-index: 0
  font-size: 14px
  font-weight: 700
  line-height: 100%
  display: flex
  align-items: center
  justify-content: space-between
  cursor: pointer
  padding: 11px 16px
  background-color: #F1F3F8
  border-radius: 6px
  overflow: hidden
  transition: color $default-transition, background-color $default-transition

  &_active
    background-color: $color-blue

    .filter-toggle__text
      color: #fff

.filter-toggle__marker
  +absoluteFluid
  background-color: $color-blue
  opacity: 0
  transition: opacity $default-transition

.filter-toggle_disabled
  opacity: 0.8
  cursor: default

.filter-toggle__text
  z-index: 1
  color: $color-black60
  transition: color $default-transition

.filter-toggle__control:checked
  ~ .filter-toggle__text
    color: #fff

  ~ .filter-toggle__marker
    opacity: 1

+mq(desktop)
  .filter-toggle
    padding: 14px 16px
    border-radius: 12px

    &:hover
      .filter-toggle__text
        color: #fff

      .filter-toggle__marker
        opacity: 1

</style>
