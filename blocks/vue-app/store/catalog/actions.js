import { prepareCatalogQueryParams, prepareFilterQueryParams } from './helpers/prepareQueryParams'
import { createCatalogCacheKey, addCache, getCache, createFilterCacheKey } from './helpers/cacheHelper'
import { resetControls, resetControl } from './helpers/filterHelper'
import { updateState } from './helpers/updateState'

const cache = {}

export default {
  async goToPage({commit, state, dispatch}, {page, isAppend = false}) {
    if (page) {
      // здесь сохраняем только номер следующей страницы
      commit('setPagerParam', {pagerParamValue: page})

      await dispatch('sendCatalogRequest', {isAppend})
    }
  },

  async resetRequest({state, dispatch}) {
    const newControls = resetControls({controls: state.controls})

    await dispatch('sendFilterRequest', {controls: newControls})
    dispatch('sendCatalogRequest', {})
  },

  async sendFilterRequest({state, commit}, {controls}) {
    commit('setStatus', {status: 'LOADING'})
    // при изменении фильтра сбрасываем пагинацию, чтобы начинать с первой страницы
    commit('setPagerParam', { pagerParamValue: 1 })

    const cacheKey = createFilterCacheKey(controls)

    // если есть результат запроса с таким ключом, то используем его, если нет, то делаем запрос
    if (!cache.hasOwnProperty(cacheKey)) {
      const url = state.filterUrl,
        // формируем параметры url
        params = prepareFilterQueryParams(controls)

      let endpoint = url.split('?')[0] + '?' + params.toString()

      const response = await fetch(endpoint, {
        headers: {
          'x-requested-with': 'xmlhttprequest',
          'Content-Type': 'application/json; charset=utf-8'
        },
      })

      if (response.ok) {
        const data = await response.json()

        if (data) {
          addCache(cache, cacheKey, {
            FILTER_URL: data.FILTER_URL,
            context: data.context,
          })

          updateState(commit, data)
        }

        commit('setStatus', {status: 'NOT_LOADING'})
      }
    } else {
      const data = getCache(cache, cacheKey)

      if (data) {
        updateState(commit, data)
      }

      commit('setStatus', {status: 'NOT_LOADING'})
    }
  },

  async sendCatalogRequest({commit, state, getters}, {isAppend = false}) {
    commit('setStatus', {status: 'LOADING'})

    const url = state.catalogUrl,
      params = prepareCatalogQueryParams(state, getters)

    let endpoint = url.split('?')[0] + '?' + params.toString()

    const response = await fetch(endpoint, {
      headers: {
        'x-requested-with': 'xmlhttprequest',
        'Content-Type': 'text/html; charset=utf-8'
      },
    })

    if (response.ok) {
      const data = await response.text()

      if (data) {
        const productsList = document.querySelector('.products-list')

        if (isAppend) {
          productsList.insertAdjacentHTML('beforeend', data)
        } else {
          productsList.innerHTML = data
        }

        setTimeout(() => window.initProductsList(), 200)
      }

      commit('setStatus', {status: 'NOT_LOADING'})
    }
  },

  // сбрасываем контрол по нажатию с стеке
  resetControlRequest({commit, state, getters, dispatch}, payload) {
    const newControls = resetControl({controls: state.controls}, payload)

    dispatch('sendFilterRequest', {controls: newControls})
  },
}