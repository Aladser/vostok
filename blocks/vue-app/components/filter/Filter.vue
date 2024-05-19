<template>
    <div class="filter catalog-section-filter">
        <template v-if="isMobile">
            <div class="filter__mobile-top">
                <FilterTrigger @click="toggleModal"/>
                <ResetButton :button-click-handler="resetClickHandler"/>
            </div>
            <transition appear name="fade" v-if="isModalOpen">
                <FilterModal :close-click-handler="closeModal">
                    <template v-slot:top>
                        <FilterModalTop :close-click-handler="closeModal"
                                        title="Фильтры"/>
                    </template>
                    <template>
                        <FilterForm :controls="controls"
                                    :loading="isLoading"
                                    :control-change-handler="controlChangeHandler"/>
                    </template>
                    <template v-slot:bottom v-if="controls.length">
                        <FilterModalBottom :loading="isLoading"
                                           :has-changes="hasChanges"
                                           :apply-click-handler="applyFilter"
                                           :reset-click-handler="resetClickHandler"/>
                    </template>
                </FilterModal>
            </transition>
        </template>
        <template v-else>
            <ResetButton :button-click-handler="resetClickHandler"/>
            <FilterForm :controls="controls"
                        :loading="status === 'LOADING'"
                        :is-desktop="isDesktop"
                        :control-change-handler="controlChangeHandler"/>
        </template>
    </div>
</template>

<script>
  import { adaptiveWindowSizeMixin } from '../../mixins/adaptiveWindowSizeMixin'
  import { mapActions, mapGetters } from 'vuex'
  import FilterTrigger from './FilterTrigger'
  import FilterModal from './modal/FilterModal'
  import FilterModalTop from './modal/FilterModalTop'
  import FilterModalBottom from './modal/FilterModalBottom'
  import FilterForm from './FilterForm'
  import ResetButton from './ResetButton'
  import FilterStack from '../filter/FilterStack'

  let productsListEl, changesTimer

  export default {
    name: 'FilterComponent',
    components: {
      FilterModal,
      FilterTrigger,
      FilterModalTop,
      FilterModalBottom,
      FilterForm,
      ResetButton,
      FilterStack
    },
    mixins: [adaptiveWindowSizeMixin],
    data: () => ({
      isModalOpen: false,
      controls: [],
    }),
    computed: {
      ...mapGetters('catalog', {
        baseControls: 'controls',
        status: 'status'
      }),

      hasChanges() {
        return this.controls.some(control => control.isChanged)
      },

      isLoading() {
        return this.status === 'LOADING'
      },
    },
    watch: {
      isLoading(loading) {
        if (loading) {
          productsListEl.classList.add('products-list_loading')
        } else {
          productsListEl.classList.remove('products-list_loading')
        }
      }
    },
    methods: {
      ...mapActions('catalog', ['sendFilterRequest', 'resetRequest', 'sendCatalogRequest', 'resetControlRequest', 'goToPage']),
      toggleModal() {
        const page = document.querySelector('.page')

        this.isModalOpen = !this.isModalOpen

        if (this.isModalOpen) {
          page.classList.add('page_modal-opened')
        } else {
          page.classList.remove('page_modal-opened')
        }
      },

      showModal() {
        const page = document.querySelector('.page')

        this.isModalOpen = true

        page.classList.add('page_modal-opened')
      },

      closeModal() {
        const page = document.querySelector('.page')

        this.isModalOpen = false

        page.classList.remove('page_modal-opened')
      },

      async controlChangeHandler({index, type, value, valueIndex, values}) {
        switch (type) {
          case 'range':
            this.rangeChangeHandler({index, value})
            break
          case 'checkbox':
            this.toggleChangeHandler({index, value})
            break
          case 'checkboxList':
            this.checkboxListChangeHandler({index, value, valueIndex, values})
            break
        }

        clearTimeout(changesTimer)

        changesTimer = setTimeout(async () => {
          await this.sendFilterRequest({controls: this.controls})
          this.resetControls()
          if (!this.isMobile) await this.sendCatalogRequest({})
        }, 500)
      },

      rangeChangeHandler({index, value}) {
        this.controls[index].isChanged = true
        if (value[0]) this.controls[index].values[0].value = value[0]
        if (value[1]) this.controls[index].values[1].value = value[1]
      },

      toggleChangeHandler({index, value}) {
        this.controls[index].isChanged = true
        this.controls[index].checked = value
      },

      checkboxListChangeHandler({index, value, valueIndex, values}) {
        if (value !== undefined && valueIndex !== undefined) {
          this.controls[index].isChanged = true
          this.controls[index].values[valueIndex].checked = value
        } else {
          this.controls[index].values = values
        }
      },

      applyFilter() {
        this.closeModal()
        this.sendCatalogRequest({})
      },

      async resetClickHandler() {
        await this.resetRequest()
        this.resetControls()
      },

      resetControls() {
        this.controls = JSON.parse(JSON.stringify(this.baseControls))
      },

      async buttonNextClicked({ target }) {
        if (target.classList.contains('infinite-button') || target.closest('.infinite-button')) {
          let page

          if (target.classList.contains('infinite-button')) {
            page = +target.dataset.pageNumber
          } else if (target.closest('.infinite-button')) {
            page = +target.closest('.infinite-button').dataset.pageNumber
          }

          await this.goToPage({ page, isAppend: true })

          const button = target.closest('.infinite-button-wrap')
          button.parentElement.removeChild(button)
        }
      }
    },
    mounted() {
      this.resetControls()

      productsListEl = document.querySelector('.products-list')
    },
    created() {
      document.addEventListener('click', this.buttonNextClicked.bind(this))
    }
  }
</script>

<style lang="sass">
    .filter__mobile-top
        display: flex
        align-items: center
</style>