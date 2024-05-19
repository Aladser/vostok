<template>
  <div class="filter-group" :class="{ 'filter-group_is-toggle': control.isToggle }">
    <component
        v-bind:is="controlComponent(control.type)"
        v-bind="control"
        :index="index"
        :control-change-handler="controlChangeHandler"/>
  </div>
</template>

<script>
import CheckboxListControl from './controls/CheckboxListControl.vue'
import CheckboxToggleControl from "./controls/CheckboxToggleControl"
import RangeControl from './controls/RangeControl'

const controlsTypes = [
  {
    name: 'checkboxList',
    component: CheckboxListControl,
  },
  {
    name: 'checkbox',
    component: CheckboxToggleControl,
  },
  {
    name: 'range',
    component: RangeControl
  }
]

export default {
  name: 'FilterGroup',
  props: {
    index: Number,
    control: {type: Object, default: () => ({})},
    controlChangeHandler: Function,
  },
  methods: {
    controlComponent(needControlType) {
      const type = controlsTypes.filter((type) => {
        return type.name === needControlType
      })[0]

      return type.component
    },
  },
}
</script>

<style lang="sass">
@import '../../../variables/variables'
@import '../../../mixins/mixins'

.filter-group
  margin-bottom: 30px
  min-width: 0

  &:last-child
    margin-bottom: 0

+mq(tablet)
  .filter-group
    margin-bottom: 0

    &_is-toggle
      margin-bottom: 10px
      grid-column-start: 1
      grid-column-end: -1

+mq(desktop)
  .filter-group
    &_is-toggle
      &:first-child
        grid-column: span 2

      ~ .filter-group
        &:nth-child(2)
          order: -2
        &:nth-child(3)
          order: -1

</style>
