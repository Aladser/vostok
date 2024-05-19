<template>
  <div class="filter-modal-top">
    <div class="container filter-modal-top-container">
      <div class="filter-modal__title">
        {{title}}
      </div>
      <button class="filter-modal__close" type="button" @click="closeClickHandler">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.726 10.178l6.882-6.881a1.094 1.094 0 1 0-1.548-1.548L10.18 8.631 3.297 1.749a1.094 1.094 0 1 0-1.548 1.548l6.882 6.881L1.75 17.06a1.094 1.094 0 1 0 1.548 1.547l6.882-6.882 6.881 6.882a1.092 1.092 0 0 0 1.548 0 1.094 1.094 0 0 0 0-1.547l-6.882-6.882z" fill="#282D3C" stroke="#282D3C"/></svg>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FilterModalTop',
  props: {
    title: String,
    closeClickHandler: Function,
  }

}
</script>

<style lang="sass">
@import '../../../../variables/variables'
@import '../../../../mixins/mixins'

.filter-modal-top
  padding: 60px 0 20px

.filter-modal-top-container
  display: flex
  align-items: center
  justify-content: space-between

.filter-modal__title
  font-size: 28px
  line-height: 34px
  font-weight: 700
  color: $color-black

.filter-modal__close
  margin-top: -96px
  width: 18px
  height: 18px
  flex-shrink: 0
  +svg


</style>