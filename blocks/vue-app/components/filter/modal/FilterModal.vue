<template>
  <div class="filter-modal">
    <div class="filter-modal__bg" @click="closeClickHandler"></div>
    <div class="filter-modal-inner">
      <slot name="top"></slot>
      <div class="filter-modal-view">
        <slot></slot>
      </div>
      <slot name="bottom"></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Modal',
  props: {

    closeClickHandler: Function,
  }
}
</script>

<style lang="sass">
@import '../../../../variables/variables'
@import '../../../../mixins/mixins'

.filter-modal
  position: fixed
  top: 0
  left: 0
  bottom: 0
  right: 0
  background-color: #fff
  z-index: 1000
  overflow: hidden
  overscroll-behavior-y: contain

.filter-modal__bg
  +absoluteFluid
  background-color: #fff
  cursor: pointer
  z-index: -1

.filter-modal-inner
  height: 100%
  display: flex
  flex-direction: column

.filter-modal-top
  position: relative
  flex-shrink: 0

.filter-modal-view
  background-color: #fff
  flex: 1
  min-height: 0
  overflow: hidden

.filter-modal-bottom
  flex-shrink: 0

+mq(tablet)
  .filter-modal
    background-color: transparent

  .filter-modal__bg
    background-color: #444

  .filter-modal-inner
    width: 445px
    margin-left: auto

</style>