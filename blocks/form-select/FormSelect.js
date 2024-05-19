import {AdaptiveDropdown} from "../dropdown/AdaptiveDropdown"

export class FormSelect {
  constructor(params) {
    this.params = {
      ...{
        selectors: {
          dropdown: '.form-select-dd',
          current: '.form-select-current',
          currentText: '.form-select-current__text',
          value: '.form-select__value',
          control: ".form-select__control"
        },
        classes: {
          dropdownExpand: 'form-select-dd_expand',
          dropdownHasValue: 'form-select-dd_has-value',
          disabled: 'form-select-dd_disabled',
          valueSelected: 'form-select__value_selected',
          valueDisabled: 'form-select__value_disabled'
        },
        oneOpen: true,
        multiple: false,
      },
      ...params
    }

    this.init()
  }

  init() {
    this.selectors = this.params.selectors
    this.classes = this.params.classes
    this.dropdownChangeHandler = this.dropdownChangeHandler.bind(this)
    this.controlChangeHandler = this.controlChangeHandler.bind(this)
    this.selectList = document.querySelectorAll(this.selectors.dropdown)
    this.dropdownList = {}

    if (this.selectList.length) {
      this.initDropdown()
    }
  }

  initDropdown() {
    this.selectList.forEach(select => {
      const control = select.querySelector(this.selectors.control)

      if (control) {
        this.dropdownList[control.id] = new AdaptiveDropdown({
          ...this.params,
          minWidth: 768,
          onChange: this.dropdownChangeHandler
        }, select)

        control.addEventListener('change', this.controlChangeHandler)
      }
    })
  }

  dropdownChangeHandler(valueEl, dropdown) {
    const value = valueEl.dataset['value'],
      control = dropdown.querySelector(this.selectors.control)

    if (control) {
      control.value = value
    }
  }

  controlChangeHandler(event) {
    const control = event.target,
      value = control.value,
      dropdown = control.closest(this.selectors.dropdown),
      dropdownObj = this.dropdownList[control.id]

    if (dropdown && dropdownObj) {
      const dropdownValue = dropdown.querySelector(`${this.selectors.value}[data-value="${value}"]`)

      if (dropdownValue) {
        dropdownObj.valueClickHandler(dropdownValue, false)
      }
    }
  }
}