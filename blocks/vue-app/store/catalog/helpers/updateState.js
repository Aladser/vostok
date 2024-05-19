export const updateState = (commit, data, isAppend = false) => {
  if (data.cards) {
    if (isAppend) {
      commit('appendCards', {cards: data.cards})
    } else {
      commit('setCards', {cards: data.cards})
    }
  }

  if (data?.context?.controls) commit('setControls', {controls: data.context.controls})
  if (data.FILTER_URL) commit('setCatalogUrl', {catalogUrl: data.FILTER_URL})
  if (data.cardsTotal) commit('setCardsTotal', {cardsTotal: data.cardsTotal})
  if (data.pager) commit('setPager', {pager: data.pager})
  if (data.empty) commit('setEmpty', {empty: data.empty})
}