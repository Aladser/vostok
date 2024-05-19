import Vue from 'vue'
import Vuex from 'vuex'
import { catalog } from './catalog/index'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    catalog
  }
})

export { store }
