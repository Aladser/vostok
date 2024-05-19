import getters from './getters'
import actions from './actions'
import mutations from './mutations'

let state = {
  pager: {},
  controls: {}
}

if (window.catalogContext) {
  state = {
    ...state,
    ...window.catalogContext,
    ...window.filterContext,
  }
}

state.status = 'NOT_LOADING'
state.filterUrl = window['filter-endpoint'] ?? window.location.href
state.catalogUrl = window['catalog-endpoint'] ?? window.location.href
state.sortParam = ''
state.pagerParam = ''

export const catalog = {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}