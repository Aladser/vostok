<template>
  <div class="filter-reset-button-container">
    <button class="button button_linear-gray filter__reset-button" type="button" @click="buttonClickHandler">
      <span class="filter__reset-button-text">Очистить фильтр</span>
      <span class="filter__reset-button-icon">
        <svg width="12" height="12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.929 6l4.129-4.129a.656.656 0 1 0-.929-.928L6 5.072 1.87.942a.656.656 0 1 0-.928.93L5.072 6l-4.13 4.13a.656.656 0 1 0 .929.928L6 6.928l4.128 4.13a.655.655 0 0 0 .929 0 .656.656 0 0 0 0-.929L6.928 6z" fill="#9298A4" stroke="#9298A4" stroke-width=".5"/></svg>
      </span>
    </button>
  </div>
</template>

<script>
export default {
  name: 'ResetButton',
  props: {
    buttonClickHandler: Function,
  }

}
</script>

<style lang="sass">
@import '../../../variables/variables'
@import '../../../mixins/mixins'

.filter__reset-button
  margin-left: -8px
  padding: 8px
  font-size: 12px
  font-weight: 500
  line-height: 100%
  display: flex
  align-items: center
  justify-content: center
  color: transparentize(#151313, .4)

.filter__reset-button-icon
  margin-left: 6px
  width: 11px
  height: 11px

  path
    &[fill]
      fill: transparentize(#151313, .4)
    &[stroke]
      stroke: transparentize(#151313, .4)

.filter-reset-button-container
  margin-left: 20px

+mq(tablet)
  .filter-reset-button-container
    margin: 40px 0 0

  .filter__reset-button
    color: #9298A4

  .filter__reset-button-icon
    path
      &[fill]
        fill: #9298A4
      &[stroke]
        stroke: #9298A4

+mq(desktop)
  .filter__reset-button
    margin-left: auto
    margin-right: -8px

    &:hover
      color: $main-color

      .filter__reset-button-icon path
        stroke: $main-color

  .filter__reset-button-icon path
    transition: $default-transition

</style>