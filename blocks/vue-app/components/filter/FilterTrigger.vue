<template>
  <div class="filter-trigger-container">
    <button class="button button_filled_blue filter-trigger"
            type="button"
            :disabled="disabled"
            @click="$emit('click')">
      <span class="filter-trigger__text">Фильтры</span>
      <span class="filter-trigger__icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 14 14"><path fill="#fff" fill-rule="evenodd" d="M.661.815c-.24.065-.553.376-.623.62a.95.95 0 0 0 .444 1.09.833.833 0 0 0 .418.114h12.214a.834.834 0 0 0 .419-.113c.107-.062.256-.2.33-.306.114-.16.137-.245.137-.508s-.023-.348-.136-.509a1.266 1.266 0 0 0-.331-.305.836.836 0 0 0-.419-.113L7.084.777C3.228.772.764.787.66.815Zm0 5.607c-.24.066-.553.377-.623.621a.95.95 0 0 0 .444 1.09.833.833 0 0 0 .418.113h12.214a.834.834 0 0 0 .419-.113c.107-.062.256-.2.33-.305.114-.16.137-.245.137-.509 0-.263-.023-.348-.136-.508a1.266 1.266 0 0 0-.331-.305.836.836 0 0 0-.419-.113l-6.03-.008c-3.856-.005-6.32.01-6.423.037Zm0 5.608c-.24.065-.553.377-.623.62a.95.95 0 0 0 .444 1.091.834.834 0 0 0 .418.113H7.103a.853.853 0 0 0 .449-.128c.317-.196.447-.428.447-.799 0-.37-.13-.603-.447-.8A.856.856 0 0 0 7.103 12l-3.016-.008c-1.967-.005-3.325.01-3.426.038Z" clip-rule="evenodd"/></svg>
      </span>
    </button>
  </div>
</template>

<script>
export default {
  name: 'FilterTrigger',
  props: {
    disabled: Boolean,
  }
}
</script>

<style lang="sass">
@import '../../../variables/variables'
@import '../../../mixins/mixins'

.filter-trigger
  min-width: 146px
  padding: 13px 16px 13px 20px
  display: flex
  align-items: center
  justify-content: space-between
  font-size: 14px
  font-weight: 600
  line-height: 100%
  border-radius: 6px

.filter-trigger__icon
  width: 14px
  height: 14px
  margin-left: 8px
  +svg

+mq(tablet)
 .filter-trigger-container
   margin-right: 20px

</style>
