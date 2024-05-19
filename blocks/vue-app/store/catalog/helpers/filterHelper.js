export const resetControls = ({controls}) => controls.map(control => {
  handleControl(control, '')

  return control
})

export const resetControl = ({controls}, {controlId, valueId}) => controls.map(control => {
  if (control.id === controlId) handleControl(control, valueId)

  return control
})

function handleControl(control, valueId = '') {
  if (control.type === 'range') resetRangeControl(control)

  if (control.type === 'checkboxList') resetCheckboxListControl(control, valueId)

  if (control.type === 'checkbox') resetCheckboxControl(control)
}

function resetRangeControl(control) {
  control.values = control.values.map(value => {
    value.value = value.baseValue

    return value
  })
}

function resetCheckboxListControl(control, valueId = '') {
  control.values = control.values.map(value => {
    if (!valueId || value.id === valueId) {
      value.checked = false
    }

    return value
  })
}

function resetCheckboxControl(control) {
  control.checked = false
}