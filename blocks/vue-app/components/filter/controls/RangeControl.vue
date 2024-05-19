<template>
  <div class="range-wrapper">
    <div class="range-label">{{ label }}</div>
    <div class="range">
      <div class="range-controls">
        <RangeInput v-if="values && values[0]"
                    class="range-min"
                    ref="minControl"
                    :label="'от'"
                    :value="inputMin"
                    :name="values[0].name"
                    :placeholder="values[0].baseValue"
                    :input-handler="onMinInputHandler"/>
        <RangeInput v-if="values && values[1]"
                    class="range-max"
                    :label="'до'"
                    ref="maxControl"
                    :value="inputMax"
                    :name="values[1].name"
                    :placeholder="values[1].baseValue"
                    :input-handler="onMaxInputHandler"/>
      </div>
      <div class="range-slider" v-if="showRangeSlider">
        <vue-slider
          :min="values[0].baseValue"
          :max="values[1].baseValue"
          :interval="intervalValue"
          :silent="true"
          :duration="0.2"
          :tooltip="'none'"
          :useKeyboard="false"
          :dot-size="10"
          v-model="rangeValue"
          ref="slider"
          @change="onRangeChangeHandler"/>
      </div>
    </div>
  </div>
</template>

<script>
import VueSlider from 'vue-slider-component'
import RangeInput from "./RangeInput"

import {filterControlPropsMixin} from "../../../mixins/filterControlPropsMixin"

let changeTimer

export default {
  name: 'RangeControl',
  mixins: [filterControlPropsMixin],
  components: {
    VueSlider,
    RangeInput,
  },
  data: () => ({
    isMinMax: false,
    inputMin: 0,
    inputMax: 0,
    minInputTimer: null,
    maxInputTimer: null,
    // задаем отдельную переменную для ползунка, тк он неадекватно реагирует на краевые значения
    rangeValue: null,
  }),
  props: {
    controlChangeHandler: Function,
  },
  computed: {
    showRangeSlider() {
      return this.isMinMax ? (this.values[0].baseValue !== undefined && this.values[1].baseValue !== undefined) : this.values[0].baseValue !== undefined
    },
    intervalValue() {
      if (this.options) {
        if (this.options.interval) {
          return this.options.interval
        }
      }

      return 1
    }
  },
  watch: {
    values() {
      this.initControls()
    }
  },
  methods: {
    initControls() {
      this.isMinMax = this.values.length === 2
      this.inputMin = this.values[0].value || 0
      this.inputMax = this.values[1].value || 0
      // Массив значений для плагина ползунка
      this.rangeValue = this.isMinMax ? [this.values[0].value, this.values[1].value] : this.values[0].value
    },

    onRangeChangeHandler(value) {
      if (Array.isArray(value)) {
        this.inputMin = +value[0]
        this.inputMax = +value[1]
      } else {
        this.inputMin = +value
      }

      this.inputHandler()
    },

    onMinInputHandler(e) {
      const maxValue = this.rangeValue[1],
        // input типа text, поэтому приводим к типу Число
        pureValue = this.purifyText(e.target.value)

      // Проверяем, чтобы значение не было меньше значения по умолчанию и не больше правой границы
      let trueValue = Math.min(Math.max(pureValue, this.values[0].baseValue), maxValue)

      // в значении из поля храним форматированную строку, чтобы использовать v-model
      this.inputMin = trueValue
      // меняем значение в ползунке в соответствии с полем
      this.rangeValue = [trueValue, maxValue]

      // инициируем фильтр
      this.inputHandler()
    },

    onMaxInputHandler(e) {
      const minValue = this.rangeValue[0],
        pureValue = this.purifyText(e.target.value)

      let trueValue = Math.max(Math.min(pureValue, this.values[1].baseValue), minValue)

      this.inputMax = trueValue
      this.rangeValue = [minValue, trueValue]
      this.inputHandler()
    },

    inputHandler() {
      clearTimeout(changeTimer)

      changeTimer = setTimeout(() => {
        this.controlChangeHandler({
          index: this.index,
          type: this.type,
          value: this.rangeValue,
        })
      }, 600)
    },

    purifyText(text) {
      return +text.toString().replace(/\D/g, '')
    },
  },
  mounted() {
    this.initControls()
  }
}
</script>

<style lang="sass">
@import '../../../../variables/variables'
@import '../../../../mixins/mixins'

.range
  position: relative

.range-label
  font-size: 12px
  line-height: 14px
  font-weight: 500
  color: #828894
  margin-bottom: 8px

.range-controls
  padding: 0 16px
  position: relative
  display: flex
  justify-content: space-between
  gap: 16px
  border: 1px solid #E2E2E2
  background-color: #fff
  border-radius: 6px
  box-shadow: 0 8px 24px 0 transparentize(#8187BD, .9)

  &:before
    content: '—'
    display: block
    position: absolute
    font-size: 14px
    line-height: 100%
    font-weight: 600
    color: #828894
    top: 15px
    left: calc(50% - 6px)

.range-slider
  position: absolute
  left: 0
  width: 100%
  padding: 0 21px
  bottom: -7px

  .vue-slider-rail
    height: 2px
    background: #D9D9D9
    border-radius: 10px

  .vue-slider-dot
    border-radius: 50%
    cursor: pointer
    background-color: $color-blue
    z-index: 1

  .vue-slider-process
    cursor: pointer
    background-color: $color-blue

+mq(tablet)
  .range-controls
    background-color: #F1F3F8
    border-color: #F1F3F8

  .range-slider
    .vue-slider-rail
      background-color: #F1F3F8

+mq(desktop)
  .range-controls
    border-radius: 12px

    &:before
      top: 21px

</style>
