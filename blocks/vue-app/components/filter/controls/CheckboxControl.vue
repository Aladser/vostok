<template>
  <label class="filter-checkbox" :class="{ 'filter-checkbox_disabled': disabled }">
    <input
      type="checkbox"
      :checked="checked"
      :name="name"
      :value="value"
      :disabled="disabled"
      class="form-hidden filter-checkbox__control"
      ref="filter-checkbox"
      @change="valueChangeHandler"/>
    <span class="filter-checkbox__text" v-html="label"></span>
    <span class="filter-checkbox__count" v-if="count">{{ showCount }}</span>
    <span class="filter-checkbox__marker">
      <svg width="9" height="7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.446 6.871a.458.458 0 0 1-.65 0L.203 4.276a.689.689 0 0 1 0-.974l.325-.325a.69.69 0 0 1 .975 0l1.62 1.62L7.497.22c.27-.27.706-.27.975 0l.325.324c.27.27.27.706 0 .975L3.446 6.871z" fill="#282D3C" fill-opacity=".7"/></svg>
    </span>
  </label>
</template>

<script>
import {formatNumber} from "../../../../helpers/formatNumber"

export default {
  name: 'CheckboxControl',
  props: {
    index: Number,
    label: String,
    disabled: Boolean,
    name: String,
    value: String,
    multiple: Boolean,
    checked: Boolean,
    chooseAll: Boolean,
    count: Number,

    controlChangeHandler: Function,
  },
  computed: {
    showCount() {
      return formatNumber(this.count)
    }
  },
  methods: {
    valueChangeHandler(e) {
      this.controlChangeHandler({
        index: this.index,
        value: e.target.checked,
      })
    },
  },
}
</script>

<style lang="sass">
@import '../../../../variables/variables'
@import '../../../../mixins/mixins'

.filter-checkbox
  padding: 16px 16px 0 16px
  display: flex
  align-items: center
  width: 100%
  font-size: 14px
  line-height: 100%
  font-weight: 700
  text-transform: uppercase
  letter-spacing: 0.04em
  position: relative
  cursor: pointer
  user-select: none

.filter-checkbox__text
  width: 100%
  padding-bottom: 15px
  padding-right: 22px
  border-bottom: 1px solid transparentize(#1B1B1B, .9)

.filter-checkbox_disabled
  color: $main-color50

.filter-checkbox__marker
  position: absolute
  right: 16px
  top: 18px
  width: 9px
  height: 7px
  flex-shrink: 0
  transition: $default-transition
  opacity: 0
  +svg

.filter-checkbox__control:checked ~ .filter-checkbox__marker
  opacity: 1

.filter-checkbox__count
  margin-left: 10px
  color: $main-color60
  flex-shrink: 0

+mq(desktop)
  .filter-checkbox
    font-size: 16px
    padding: 19px 16px 0 16px
    transition: background-color $default-transition

    &:hover
      background-color: #F1F3F8

  .filter-checkbox__text
    padding-bottom: 19px

  .filter-checkbox__marker
    top: 23px

</style>
