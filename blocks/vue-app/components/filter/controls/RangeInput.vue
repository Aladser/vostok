<template>
  <div class="range-item" :class="{'range-item_filed': value}">
    <div class="range-item__label" v-if="label">{{label}}</div>
    <input
      type="text"
      autocomplete="none"
      class="range-item__control"
      :value="showValue"
      :name="name"
      :placeholder="placeholder"
      @input="inputHandler"/>
  </div>
</template>

<script>
import {formatNumber} from "../../../../helpers/formatNumber"

export default {
  name: 'RangeInput',
  props: {
    label: String,
    name: String,
    value: Number,
    placeholder: Number,
    inputHandler: Function,
  },
  computed: {
    showValue() {
      return formatNumber(this.value)
    }
  }
}
</script>

<style lang="sass">
@import '../../../../variables/variables'
@import '../../../../mixins/mixins'

.range-item
  display: flex
  align-items: center
  justify-content: flex-end
  position: relative
  z-index: 0
  min-width: 0
  flex: 1

.range-item__label
  flex-shrink: 0
  margin-right: 10px
  font-size: 14px
  line-height: 100%
  font-weight: 600
  color: #828894

.range-item__control
  width: auto
  min-width: 0
  background-color: transparent
  padding: 14px 0
  font-size: 14px
  letter-spacing: 0.04em
  font-weight: 700
  line-height: 100%

.range-max
  .range-item__control
    width: 40px

+mq(desktop)
  .range-item__control
    font-size: 16px
    padding: 18px 0

  .range-max
    .range-item__control
      width: 44px

</style>