export const prepareCatalogQueryParams = (state) => {
  const params = new URLSearchParams(""),
    sortParamValue = state.sortParam,
    pagerParamValue = state.pagerParam,
    pagerId = state.pager.id

  params.append('is_ajax', 'y')

  if (sortParamValue) {
    params.append('sort', sortParamValue)
  }

  if (pagerId && pagerParamValue && pagerParamValue > 1) {
    params.append('PAGEN_' + pagerId, pagerParamValue)
  }

  return params
}

export const prepareFilterQueryParams = (controls) => {
  const params = new URLSearchParams("")

  controls.map(control => {
    if (control.isChanged) {
      if (control.type === 'range') {
        control.values.map(value => {
          if (+value.value !== +value.baseValue) {
            params.append(value.name, value.value)
          }
        })
      }

      if (control.type === 'checkboxList') {
        control.values.map(value => {
          if (value.checked) {
            params.append(value.name, 'Y')
          }
        })
      }

      if (control.type === 'checkbox' && control.checked) {
        params.append(control.name, 'Y')
      }
    }
  })

  params.append('ajax', 'y')

  return params
}