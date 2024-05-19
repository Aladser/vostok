<template>
  <div class="filter-modal-bottom">
    <div class="container filter-modal-bottom-container">
      <button class="button button_filled_blue filter-modal__button"
              type="button"
              @click="applyClickHandler">Применить</button>
      <button class="button button_linear_gray filter-modal__button"
              :disabled="!hasChanges"
              type="button"
              @click="resetClickHandler">Сбросить</button>
    </div>
    <transition appear name="fade" v-if="loading">
      <div class="filter-overlay"></div>
    </transition>
  </div>
</template>

<script>
export default {
  name: 'FilterModalBottom',
  props: {
    loading: Boolean,
    hasChanges: Boolean,
    applyClickHandler: Function,
    resetClickHandler: Function,
  }
}
</script>

<style lang="sass">
@import '../../../../variables/variables'
@import '../../../../mixins/mixins'

.filter-modal-bottom
  position: relative
  z-index: 0
  padding: 16px 0
  background-color: #fff
  box-shadow: 0 4px 54px rgba(15, 25, 63, 0.18)

.filter-modal-bottom-container
  display: flex
  align-items: center
  justify-content: space-between
  gap: 12px

.filter-modal__button
  font-size: 14px
  font-weight: 700
  line-height: 15px
  padding: 16px 20px
  text-align: center
  border-radius: 6px
  width: 100%

.filter-modal__button:disabled
  opacity: 0.4
  cursor: default

</style>