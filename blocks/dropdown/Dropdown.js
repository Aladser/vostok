import './dropdown.mustache'

export class Dropdown {
	constructor(params) {
		this.params = {
			...{
				selectors: {
					dropdown: '.dropdown',
					current: '.dropdown-current',
					currentText: '.dropdown-current__text',
					value: '.dropdown__value'
				},
				defaultCurrentText: 'Выберите элемент',
				animationSpeed: 400,
				oneOpen: false,
				multiple: false,
				_active: true,
				classes: {
					dropdownExpand: 'dropdown_expand',
					dropdownHasValue: 'dropdown_has-value',
					valueSelected: 'dropdown__value_selected',
					valueDisabled: 'dropdown__value_disabled',
					disabled: 'dropdown_disabled'
				},
				onInit: false,
				onOpen: false,
				onClose: false,
				onChange: false
			},
			...params
		}

		this.init()
	}

	init() {
		this.selectors = this.params.selectors
		this.classes = this.params.classes
		this.dropdown = document.querySelector(this.selectors.dropdown)

		if (this.params.onInit && typeof this.params.onInit === 'function') {
			this.params.onInit(this.dropdown)
		}

		this.attachEvents()
	}

	attachEvents() {
		this.dropdown.addEventListener(
			'click',
			this.dropdownClickHandler.bind(this)
		)

		if (this.params.oneOpen) {
			document.addEventListener(
				'click',
				this.documentClickHandler.bind(this)
			)
			document.addEventListener(
				'dropdown.collapseAll',
				this.dropdownCollapseAll.bind(this)
			)
		}
	}

	currentClickHandler(current) {
		let dropdown = current.closest(this.selectors.dropdown)

		if (!dropdown.classList.contains(this.classes.disabled)) {
			this.listToggle(dropdown)
		}
	}

	listToggle(dropdown) {
		if (this.params._active) {
			if (dropdown.classList.contains(this.classes.dropdownExpand)) {
				this.dropdownCollapse(dropdown)
			} else {
				if (this.params.oneOpen) {
					this.dropdownCollapseAll()
				}

				this.dropdownExpand(dropdown)
			}
		}
	}

	dropdownExpand(dropdown) {
		dropdown.classList.add(this.classes.dropdownExpand)

		if (
			this.params.onOpen &&
			typeof this.params.onOpen === 'function'
		) {
			this.params.onOpen(dropdown)
		}
	}

	dropdownCollapse(dropdown) {
		dropdown.classList.remove(this.classes.dropdownExpand)

		if (
			this.params.onClose &&
			typeof this.params.onClose === 'function'
		) {
			this.params.onClose(dropdown)
		}
	}

	dropdownCollapseAll() {
		this.dropdownCollapse(this.dropdown)
	}

	valueClickHandler(valueEl) {
		let dropdown = valueEl.closest(this.selectors.dropdown)

		if (
			!valueEl.classList.contains(this.classes.valueDisabled)
		) {
			const value = valueEl.dataset['value']

			let currentValue = dropdown.querySelector('.' + this.classes.valueSelected),
				currentText = dropdown.querySelector(this.selectors.currentText)

			if (value) {
				this.setCurrentValue(currentText, value)
			}

			if (currentValue) {
				currentValue.classList.remove(this.classes.valueSelected)
			}

			valueEl.classList.add(this.classes.valueSelected)

			if (
				this.params.onChange &&
				typeof this.params.onChange === 'function'
			) {
				this.params.onChange(valueEl, dropdown)
			}

			if (!this.params.multiple) {
				this.dropdownCollapse(dropdown)
			}
		}
	}

	dropdownClickHandler(event) {
		if (this.params._active) {
			let target = event.target,
				current = target.closest(this.selectors.current)

			if (current) {
				this.currentClickHandler(current)

				return true
			}

			let value = target.closest(this.selectors.value)

			if (value) {
				this.valueClickHandler(value)

				return true
			}
		}
	}

	setCurrentValue(currentText, value) {
		if (value) {
			currentText.innerText = value
		} else {
			currentText.innerText = this.params.defaultCurrentText
		}
	}

	documentClickHandler(event) {
		if (this.params._active) {
			const target = event.target,
				expandedDropdown = target.closest(
					'.' + this.classes.dropdownExpand
				)

			if (!expandedDropdown) {
				document.dispatchEvent(new Event('dropdown.collapseAll'))
			}
		}
	}

	dropdownReset() {
		let selectedValue = this.dropdown.querySelector('.' + this.classes.valueSelected),
			currentText = this.dropdown.querySelector(this.selectors.currentText)

		if (selectedValue.length) {
			selectedValue.classList.remove(this.classes.valueSelected)

			this.setCurrentValue(currentText)
		}
	}
}
