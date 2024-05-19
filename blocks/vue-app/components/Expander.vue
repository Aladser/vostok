<template>
    <div class="v-expander"
         :class="{'v-expander_expand': expanded, 'v-expander_unset': unset}">
        <div class="v-expander-hidden" :style="expanderHiddenStyle" ref="hidden">
            <slot></slot>
        </div>
        <div class="v-expander-toggle-container" v-if="!unset">
            <button class="v-expander__toggle" type="button" @click="expanderToggleClick">
                <span class="v-expander__toggle-text">{{ expanderToggleText }}</span>
                <span class="v-expander__toggle-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" fill="none" viewBox="0 0 12 8"><path fill="#0072FF" d="M1.42 0 6 4.768 10.59 0 12 1.468 6 7.714 0 1.468 1.42 0Z"/></svg>
            </span>
            </button>
        </div>
    </div>
</template>

<script>
  const EXPANDER_DELTA = 100

  export default {
    name: 'Expander',
    data: () => ({
      expanded: false,
      unset: false,
      baseHeight: 0,
      maxHeight: 0,
    }),
    props: {
      expandedText: {type: String, default: 'Свернуть'},
      collapsedText: {type: String, default: 'Показать все'},
      itemsInList: Number,
      itemsSelector: String,
    },
    computed: {
      expanderToggleText() {
        return this.expanded ? this.expandedText : this.collapsedText
      },
      expanderHiddenStyle() {
        if (this.maxHeight && this.baseHeight) {
          if (!this.unset) {
            return {
              'max-height': (this.expanded ? this.maxHeight : this.baseHeight) + 'px'
            }
          }
        }

        return {}
      },
    },
    methods: {
      setExpanderHeight() {
        let baseHeight = 0,
          maxHeight = 0

        if (this.itemsSelector && this.itemsInList && this.$refs.hidden) {
          const itemsList = this.$refs.hidden.querySelectorAll(this.itemsSelector)

          itemsList.forEach((item, index) => {
            if (index < this.itemsInList) {
              baseHeight += item.offsetHeight
            }

            maxHeight += item.offsetHeight
          })
        }

        this.baseHeight = baseHeight
        this.maxHeight = maxHeight

        this.unset = (maxHeight - EXPANDER_DELTA) <= baseHeight
      },
      expanderToggleClick() {
        this.expanded = !this.expanded
      },
    },
    mounted() {
      this.setExpanderHeight()
    }
  }
</script>

<style lang="sass">
    @import '../../variables/variables'
    @import '../../mixins/mixins'

    .v-expander_expand .v-expander__toggle-icon
        transform: rotate(-180deg)

    .v-expander-hidden
        overflow: hidden
        transition: max-height $default-transition

    .v-expander__toggle-icon
        transition: $default-transition

</style>