export const createCatalogCacheKey = (state) => {
  const url = state.catalogUrl,
    sortParamValue = state.sortParam,
    pagerParamValue = state.pagerParam,
    match = url.match(/filter\/(.*)\/apply\//gmi)

  let cacheKey = ''

  if (match) cacheKey = match[0]

  if (sortParamValue) cacheKey += (cacheKey ? '|' : '') + 'sort' + sortParamValue

  if (pagerParamValue) cacheKey += (cacheKey ? '|' : '') + 'page' + pagerParamValue

  return cacheKey
}

export const addCache = (cache, cacheKey, cacheValue) => {
  cache[cacheKey] = JSON.stringify(cacheValue)
}

export const getCache = (cache, cacheKey) => {
  const cacheValue = cache[cacheKey]

  if (cacheValue) {
    return JSON.parse(cacheValue)
  }

  return {}
}

export const createFilterCacheKey = (controls) => {
  let cacheKey = ''

  controls.map(control => {
    let cacheKeyPart = ''

    if (control.type === 'range') {
      control.values.map(value => {
        if (+value.value !== +value.baseValue) {
          cacheKeyPart += value.type + value.value + '|'
        }
      })
    }

    if (control.type === 'checkboxList') {
      control.values.map(value => {
        if (value.checked) {
          cacheKeyPart += value.id + '|'
        }
      })
    }

    if (control.type === 'checkbox' && control.checked) cacheKeyPart += control.id + '|'

    if (cacheKeyPart) {
      cacheKeyPart = cacheKeyPart.slice(0, -1) + ';'

      cacheKey += control.id + ':' + cacheKeyPart
    }
  })

  return cacheKey
}