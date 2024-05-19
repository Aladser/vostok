<template>
    <button class="checkbox-reset-control filter-toggle swiper-slide"
            :class="{ 'filter-toggle_active': active }"
            type="button"
            @click="$emit('click')">
        <span class="filter-toggle__text">Все</span>
    </button>
</template>

<script>
  export default {
    name: 'CheckboxResetControl',
    props: {
      active: {
        type: Boolean,
        default: false
      }
    }
  }
</script>

<style lang="sass">
@import '../../../../variables/variables'
@import '../../../../mixins/mixins'

+mq(desktop)
    .checkbox-reset-control
        &:hover
            background-color: $color-blue
</style>