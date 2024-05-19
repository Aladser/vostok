export default {
  setStatus: (state, {status}) => state.status = status,
  setPagerParam: (state, {pagerParamValue}) => state.pagerParam = pagerParamValue,
  setPager: (state, {pager}) => state.pager = pager,
  setFilterUrl: (state, {filterUrl}) => state.filterUrl = filterUrl,
  setControls: (state, {controls}) => state.controls = controls
}