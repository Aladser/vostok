import { slideDown, slideUp } from '../helpers/jqueryFunctioins'

export class Accordion {
	constructor(params) {
		this.params = {
			...{
				selectors: {
					accordion: '.accordion',
					item: '.accordion-item',
					trigger: '.accordion__trigger',
					hidden: '.accordion-hidden'
				},
				classes: {
					opened: 'accordion-hidden_opened',
					initialItem: ''
				},
				transitionDuration: 300,
				defaultOpenIndexes: [],
				oneOpen: true,
				hideOnStart: true,
				closeOnBlur: false,
				onExpand: null,
				onCollapse: null,
				_active: true
			},
			...params
		}

		this.init()
	}

	init() {
		this.selectors = this.params.selectors
		this.classes = this.params.classes
		this.openDefaultItemByIndex = this.openDefaultItemByIndex.bind(this)
		this.openDefaultItemByClass = this.openDefaultItemByClass.bind(this)

		this.initAccordion()
	}

	initAccordion() {
		if (this.selectors.accordion instanceof HTMLElement) {
			this.accordion = this.selectors.accordion
		} else {
			this.accordion = document.querySelector(this.selectors.accordion)
		}

		if (this.accordion) {
			this.hiddenList = this.accordion.querySelectorAll(this.selectors.hidden)
			this.itemList = this.accordion.querySelectorAll(this.selectors.item)
			this.params._active = true

			this.attachEvents()

			if (this.params.hideOnStart) {
				this.hiddenList.forEach(hidden => (hidden.style.display = 'none'))
			}

			this.checkDefault()
		}
	}

	hideAll() {
		this.itemList.forEach(item => this.collapse(item))
	}

	openAll() {
		this.itemList.forEach(item => this.expand(item))
	}

	attachEvents() {
		this.accordion.addEventListener(
			'click',
			this.accordionClickHandler.bind(this)
		)

		if (this.params.closeOnBlur) {
			document.addEventListener('click', this.documentClick.bind(this))
		}

		if (this.params.oneOpen) {
			document.addEventListener(
				'accordion.closeAll',
				this.closeAllHandler.bind(this)
			)
		}
	}

	checkDefault() {
		if (this.params.defaultOpenIndexes.length > 0) {
			this.params.defaultOpenIndexes.forEach(this.openDefaultItemByIndex)
		} else if (this.params.classes.initialItem) {
			this.openDefaultItemByClass()
		}
	}

	openDefaultItemByIndex(itemIndex) {
		this.expand(this.itemList[itemIndex])
	}

	openDefaultItemByClass() {
		const openItem = Array.prototype.find.call(this.itemList, item => item.classList.contains(this.params.classes.initialItem))

		if (openItem) this.expand(openItem)
	}

	accordionClickHandler(event) {
		if (this.params._active) {
			let clickedTrigger = event.target.closest(this.selectors.trigger)

			if (clickedTrigger) {
				let item = clickedTrigger.closest(this.selectors.item)

				if (item.classList.contains(this.classes.opened)) {
					this.collapse(item)
				} else {
					if (this.params.oneOpen) {
						document.dispatchEvent(new Event('accordion.closeAll'))
					}

					this.expand(item)
				}
			}
		}
	}

	documentClick(event) {
		if (this.params._active) {
			let clickedItem = event.target.closest(this.selectors.item)

			if (!clickedItem) {
				let activeItem = this.accordion.querySelectorAll(
					'.' + this.classes.opened
				)

				if (activeItem) {
					this.collapse(activeItem)
				}
			}
		}
	}

	expand(item) {
		let hidden = item.querySelector(this.selectors.hidden)

		if (hidden) {
			slideDown(hidden, this.params.transitionDuration)
		}

		item.classList.add(this.classes.opened)

		if (
			this.params.onExpand &&
			typeof this.params.onExpand === 'function'
		) {
			this.params.onExpand(item)
		}
	}

	collapse(item) {
		let hidden = item.querySelector(this.selectors.hidden)

		if (hidden) {
			slideUp(hidden, this.params.transitionDuration)
		}

		item.classList.remove(this.classes.opened)

		if (
			this.params.onCollapse &&
			typeof this.params.onCollapse === 'function'
		) {
			this.params.onCollapse(item)
		}
	}

	destroy() {
		this.params._active = false
		this.hiddenList.forEach(hidden => (hidden.style.display = ''))
		this.itemList.forEach(item =>
			item.classList.remove(this.classes.opened)
		)
	}

	closeAllHandler() {
		this.itemList.forEach(item => this.collapse(item))
	}
}
