<template>
  <div class="checkbox-list-wrapper">
    <div class="checkbox-list-label" :class="{ 'checkbox-list-label_only-desktop': isToggle }">{{label}}</div>
    <div class="checkbox-list-slider swiper" ref="buttonsSlider" v-if="isToggle">
      <div class="swiper-wrapper">
        <CheckboxResetControl :active="countActiveValues === 0"
                              @click="resetClickHandler" />
        <CheckboxToggleControl v-for="checkbox in filteredValues"
                               v-bind="checkbox"
                               :key="checkbox.id"
                               :is-slide="true"
                               :value="checkbox.value"
                               :control-change-handler="valueChangeHandler" />
      </div>
      <div class="checkbox-list-scrollbar slider-scrollbar" ref="buttonsSliderScrollbar"></div>
    </div>
    <div class="checkbox-list-dropdown"
         :class="{ 'checkbox-list-dropdown_expand': expanded }"
         ref="listDropdown" v-else>
      <button class="checkbox-list-dropdown__current"
              type="button"
              @click="onListToggle">
        <span class="checkbox-list-dropdown__current-text">{{currentValue}}</span>
        <svg class="checkbox-list-dropdown__arrow" width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1.65667 -5.39544e-07L7 5.40823L12.355 -7.19052e-08L14 1.66498L7 8.75L-7.27786e-08 1.66498L1.65667 -5.39544e-07Z" fill="#282D3C" fill-opacity="0.7"/>
        </svg>
      </button>
      <div class="checkbox-list-hidden">
        <ul class="checkbox-list scrollbar">
          <li class="checkbox-list-item" v-for="(checkbox, index) in filteredValues" :key="checkbox.id" :data-value="checkbox.label">
            <CheckboxControl v-bind="checkbox"
                             :key="checkbox.id"
                             :index="index"
                             :control-change-handler="valueChangeHandler" />
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import CheckboxControl from './CheckboxControl'
import CheckboxToggleControl from './CheckboxToggleControl'
import CheckboxResetControl from './CheckboxResetControl'

import {filterControlPropsMixin} from "../../../mixins/filterControlPropsMixin"
import { isMobile } from 'helpers/responsiveChecks'
import { sliderEdgeHandler } from 'helpers/sliderEdgeHandler'
import { Swiper } from 'swiper'
import { Scrollbar } from 'swiper/modules'

export default {
  name: 'CheckboxListControl',
  mixins: [filterControlPropsMixin],
  components: {
    CheckboxControl,
    CheckboxToggleControl,
    CheckboxResetControl
  },
  data: () => ({
    phrase: '',
    expanded: false
  }),
  props: {
    isToggle: {
      type: Boolean,
      default: false
    },
    options: {
      type: Object,
      default: ({
        chooseAll: false
      })
    },
    controlChangeHandler: Function,
  },
  computed: {
    currentValue() {
      let resultValue = ''

      if (this.countActiveValues > 0) {
        const activeValues = this.values.filter(value => value.checked)

        if (this.countActiveValues > 1) {
          resultValue = `${activeValues.length} выбрано`
        } else {
          resultValue = activeValues[0].label
        }
      } else {
        resultValue = 'Не выбрано'
      }

      return resultValue
    },
    hasSearch() {
      return this.options && this.options.hasSearch
    },
    multiple() {
      return this.options && this.options.multiple
    },
    filteredValues() {
      if (this.hasSearch && !!this.phrase) {
        return this.values.filter(value => {
          if (value.chooseAll) {
            return value
          }

          return value.label.toString().toLowerCase().search(this.phrase.toString().toLowerCase()) !== -1
        })
      }

      return this.values
    },
    countActiveValues() {
      if (this.values[0].chooseAll && this.values[0].checked) {
        return this.values.length - 1
      }

      const activeValues = this.values.filter(value => value.checked)

      return activeValues.length || 0
    },
    labelFormatted() {
      let strLabel = this.label.toString()

      if (this.countActiveValues) {
        strLabel += ` (${this.countActiveValues})`
      }

      return strLabel
    },
  },
  methods: {
    onSearchInput(event) {
      const control = event.target

      this.phrase = control.value
    },

    attachEvents() {
      document.addEventListener('click', ({target}) => {
        if (target !== this.$refs.listDropdown) {
          const parentDropdown = target.closest('.checkbox-list-dropdown')

          if (parentDropdown !== this.$refs.listDropdown) {
            this.expanded = false
          }
        }
      })
    },

    initButtonsSlider() {
      if (!isMobile()) {
        new Swiper(this.$refs.buttonsSlider, {
          modules: [ Scrollbar ],
          slidesPerView: 'auto',
          watchOverflow: true,
          scrollbar: {
            el: this.$refs.buttonsSliderScrollbar,
            draggable: true,
            dragClass: 'slider-scrollbar-drag'
          },
          on: {
            init: sliderEdgeHandler({
              firstSlideClass: 'checkbox-list-slider_begin',
              lastSlideClass: 'checkbox-list-slider_end'
            }),
            transitionEnd: sliderEdgeHandler({
              firstSlideClass: 'checkbox-list-slider_begin',
              lastSlideClass: 'checkbox-list-slider_end'
            })
          }
        })
      }
    },

    resetClickHandler() {
      const values = [...this.values]

      values.forEach(value => value.checked = false)

      const control = {
        id: this.id,
        index: this.index,
        type: this.type,
        label: this.label,
        name: this.name,
        options: {
          multiple: this.multiple,
          hasSearch: this.hasSearch,
          cols: this.cols,
        },
        isChanged: false,
        values,
      }

      this.controlChangeHandler(control)
    },

    valueChangeHandler({index, value}) {
      this.controlChangeHandler({
        index: this.index,
        type: this.type,
        valueIndex: index,
        value: value,
      })
    },

    onListToggle() {
      this.expanded = !this.expanded
    }
  },
  mounted() {
    this.attachEvents()
    this.initButtonsSlider()
  }
}
</script>

<style lang="sass">
@import "../../../../variables/variables"
@import "../../../../mixins/mixins"

.checkbox-list-label
  font-size: 12px
  line-height: 14px
  font-weight: 500
  color: #828894
  margin-bottom: 8px

.checkbox-list-view
  position: relative
  padding: 25px 0 0 0

.checkbox-list-overlay
  position: absolute
  top: 0
  left: -10px
  right: -10px
  bottom: -20px
  border-radius: 4px
  background-color: transparentize($main-color, 0.75)
  z-index: 10

.checkbox-list-slider
  .swiper-slide
    width: auto
    margin-right: 16px

.checkbox-list-dropdown
  position: relative
  z-index: 0
  transition: z-index 0s $default-transition

.checkbox-list-dropdown_expand
  z-index: 2
  transition: z-index 0s

  .checkbox-list
    z-index: 100
    visibility: visible
    transition: transform $default-transition, visibility $default-transition, z-index $default-transition
    transform: translateY(0)

  .checkbox-list-dropdown__arrow
    transform: rotate(180deg)

.checkbox-list-dropdown__current
  font-size: 14px
  line-height: 100%
  font-weight: 700
  text-transform: uppercase
  letter-spacing: 0.04em
  padding: 15px 16px
  white-space: nowrap
  text-align: left
  width: 100%
  display: flex
  align-items: center
  justify-content: space-between
  border: 1px solid #E2E2E2
  box-shadow: 0 8px 24px 0 transparentize(#8187BD, .9)
  border-radius: 6px

.checkbox-list-dropdown__current-text
  text-overflow: ellipsis
  overflow: hidden
  margin-right: 25px

.checkbox-list-dropdown__arrow
  width: 14px
  height: auto
  flex-shrink: 0
  transition: $default-transition

.checkbox-list-hidden
  position: absolute
  top: 100%
  left: -24px
  right: -24px
  padding: 4px 24px 24px
  visibility: hidden
  overflow: hidden

.checkbox-list
  z-index: -1
  visibility: hidden
  transition: transform $default-transition, visibility 0s $default-transition, z-index 0s $default-transition
  transform: translateY(-100%)
  background-color: #fff
  box-shadow: 0 8px 24px 0 transparentize(#8187BD, .9)
  border-radius: 6px
  max-height: 275px
  overflow: hidden auto

.checkbox-list-item
  &:last-child
    .filter-checkbox
      .filter-checkbox__text
        border-bottom: none

+mq(tablet, max)
  .checkbox-list-scrollbar
    display: none

+mq(tablet)
  .checkbox-list-dropdown__current
    background-color: #F1F3F8
    border-color: #F1F3F8
    box-shadow: none

+mq(desktop, max)
  .checkbox-list-slider
    margin-right: -16px
    margin-bottom: -16px

    .swiper-wrapper
      flex-wrap: wrap

    .swiper-slide
      margin-bottom: 16px

  .checkbox-list-label.checkbox-list-label_only-desktop
    display: none

+mq(desktop)
  .checkbox-list-slider
    &:before,
    &:after
      content: ''
      display: block
      width: 15px
      height: 42px
      position: absolute
      top: 0
      z-index: 2
      pointer-events: none
      opacity: 0
      transition: $default-transition

    &:before
      left: 0
      background: linear-gradient(90deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%)

    &:after
      right: 0
      background: linear-gradient(270deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%)

    &.checkbox-list-slider_end
      &:before
        opacity: 1

    &.checkbox-list-slider_begin
      &:after
        opacity: 1

  .checkbox-list-scrollbar
    margin-top: 11px

  .checkbox-list-dropdown__current
    padding: 19px 24px
    font-size: 16px
    line-height: 100%
    border-radius: 12px

</style>
