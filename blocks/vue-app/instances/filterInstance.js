import Vue from 'vue'
import { store } from '../store/catalog.js'
import FilterComponent from '../components/filter/Filter'

export class FilterInstance {
  constructor(params) {
    this.params = Object.assign(
      {
        favoritesEl: '#filter-el',
      },
      params
    )

    this.init()
  }

  init() {
    const filterEl = document.querySelector(this.params.favoritesEl)

    if (filterEl) {
      new Vue({
        el: filterEl,
        store,
        render(h) {
          return h(FilterComponent)
        },
      })
    }
  }
}