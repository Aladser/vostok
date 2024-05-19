export class FormPlaceholder {
	constructor(params) {
		this.params = {
			...{
				selectors: {
					placeholder: '.form__placeholder',
					control: '.form__control',
					group: '.form-group'
				},
				classes: {
					groupFilled: 'form-group_filled'
				}
			},
			...params
		}

		this.init()
	}

	init() {
		this.selectors = this.params.selectors
		this.classes = this.params.classes
		this.placeholderList = document.querySelectorAll(this.selectors.placeholder)
		this.controlResetHandler = this.controlResetHandler.bind(this)

		if (this.placeholderList.length) {
			this.placeholderList.forEach(placeholder => {
				let group = placeholder.closest(this.selectors.group)

				if (group) {
					let control = group.querySelector(this.selectors.control)

					if (control) {
						this.checkControlFilled(control, group)

						control.addEventListener('reset', this.controlResetHandler)
					}
				}
			})
			this.attachEvents()
		}
	}

	attachEvents() {
		document.addEventListener('click', this.docClickHandler.bind(this))
		document.addEventListener('change', this.docChangeHandler.bind(this))
	}

	docClickHandler(event) {
		let placeholder = event.target.closest(this.selectors.placeholder)

		if (placeholder) {
			this.placeholderClickHandler(placeholder)
		}
	}

	placeholderClickHandler(placeholder) {
		let group = placeholder.closest(this.selectors.group)

		if (group) {
			let control = group.querySelector(this.selectors.control)

			if (control) control.focus()
		}
	}

	docChangeHandler(event) {
		let control = event.target.closest(this.selectors.control)

		if (control) {
			this.controlChangeHandler(control)
		}
	}

	controlChangeHandler(control) {
		this.checkControlFilled(control)
	}

	checkControlFilled(control, group) {
		group = group || control.closest(this.selectors.group)

		if (group) {
			if (control.value === '') {
				group.classList.remove(this.classes.groupFilled)
			} else {
				group.classList.add(this.classes.groupFilled)
				this.onFill(control, group)
			}
		}
	}

	controlResetHandler(event) {
		const control = event.target,
			group = control.closest(this.selectors.group)

		if (group) {
			group.classList.remove(this.classes.groupFilled)
		}
	}

	onFill(control, group) {
		if (control.type === 'file') {
			const filenameBlock = group.querySelector('.form__filename')
			const filesCount = control.files.length
			const text = control.files.length > 1 ? `Файлы (${filesCount} шт.)` : control.files[0].name

			if (filenameBlock) {
				filenameBlock.innerText = text
			}
		}
	}

	destroy() {
		document.removeEventListener('click', this.docClickHandler)
		document.removeEventListener('change', this.docChangeHandler)
	}
}
