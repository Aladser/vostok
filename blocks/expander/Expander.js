export class Expander {
	constructor(params) {
		this.params = {
			...{
				selectors: {
					expander: '.expander', // блок-контейнер
					toggle: '.expander__toggle', // переключатель состояний
					toggleText: '', // блок с текстом переключателя, опционально, на случай, если в переключателе есть иконка
					hidden: '.expander-hidden' // блок с контентом, который сворачивается
				},
				classes: {
					opened: 'expander_expand', // модификатор развернутого состояния
					unset: 'expander_unset' // модификатор состояния, при котором плагин неактивен для данного разрешения экрана
				},
				text: {
					expanded: 'Свернуть', // текст переключателя в развернутом положении
					collapsed: 'Развернуть', // текст переключателя в свернутом положении
					collapsedValueFromElement: false
				},
				onToggle: false, // обработчик события переключения
				_delta: 20, // разница между максимальной высотой и высотой контента, при которой плагин неактивен,
				minHeight: undefined
			},
			...params
		}

		this.init()
		this.attachEvents()
	}

	init() {
		this.selectors = this.params.selectors
		this.classes = this.params.classes

		this.expander =
			typeof this.selectors.expander === 'object' &&
			this.selectors.expander instanceof HTMLElement
				? this.selectors.expander
				: document.querySelector(this.selectors.expander)

		if (this.expander) {
			this._vpWidth = window.innerWidth
			this._minHeight = 0
			this._maxHeight = 0
			this._resizeTimer = null
			this._active = true
			this.delta = this.params._delta

			this.hidden = this.expander.querySelector(this.selectors.hidden)
			this.toggle = this.expander.querySelector(this.selectors.toggle)

			this.initTextProperty()

			this.setHeight()
		}
	}

	initTextProperty() {
		this.text = this.params.text
		const toggleText = this.expander.querySelector(this.selectors.toggleText)

		if (!toggleText){
			return false
		}

		if (this.params.text.collapsedValueFromElement) {
			this.text.collapsed = toggleText.innerText
		} else{
			toggleText.innerText = this.text.collapsed
		}
	}

	attachEvents() {
		if (this.toggle) {
			this.toggle.addEventListener(
				'click',
				this.toggleClickHandler.bind(this)
			)
		}

		this.expander.addEventListener('expand', this.expandHandler.bind(this))
		this.expander.addEventListener(
			'collapse',
			this.collapseHandler.bind(this)
		)
		window.addEventListener('resize', this.windowResizeHandler.bind(this))
	}

	windowResizeHandler() {
		clearTimeout(this._resizeTimer)

		this._resizeTimer = setTimeout(() => {
			const vpWidth = window.innerWidth

			if (vpWidth !== this._vpWidth) {
				this.setHeight()
			}

			this._vpWidth = vpWidth
		}, 250)
	}

	setHeight() {
		if (this.hidden) {
			this.expander.classList.remove(this.classes.unset)

			// сбрасываем css-стили
			this.hidden.style.maxHeight = ''
			this.hidden.style.transition = 'none'

			if (this.params.minHeight) {
				// если параметр minHeight задан явно, то используем его значение
				this._minHeight = this.params.minHeight
			} else {
				// если параметр minHeight не задан явно, то используем css-параметр max-height
				// высота в свернутом состоянии - это css-параметр max-height
				this._minHeight = parseFloat(
					window.getComputedStyle(this.hidden).maxHeight.slice(0, -2)
				)
			}
			// сбрасываем max-height, чтобы узнать высоту контента
			this.hidden.style.maxHeight = 'none'

			// высота в развернутом состоянии - это высота контента
			this._maxHeight = parseFloat(window.getComputedStyle(this.hidden).height.slice(0, -2))

			// проверка на необходимость сворачивать блок
			if (this._minHeight >= this._maxHeight - this.delta) {
				// если сворачивать не надо, добавляем модификатор и сбрасываем js-стили
				this.expander.classList.remove(this.classes.opened)
				this.expander.classList.add(this.classes.unset)
				this.hidden.style.maxHeight = ''
				this.hidden.style.transition = ''
			} else {
				// если высота контента позволяет сворачивать блок, то определяем текущее состояние блока
				this.hidden.style.maxHeight = this.expander.classList.contains(
					this.classes.opened
				)
					? `${this._maxHeight}px`
					: `${this._minHeight}px`
			}

			this.hidden.style.transition = ''
		}
	}

	toggleClickHandler(event) {
		if (this._active) {
			if (this.expander.classList.contains(this.classes.opened)) {
				this.collapse()
			} else {
				this.expand()
			}

			if (
				this.params.onToggle &&
				typeof this.params.onToggle === 'function'
			) {
				this.params.onToggle(event)
			}
		}
	}

	expand() {
		const toggleText = this.selectors.toggleText
			? this.expander.querySelector(this.selectors.toggleText)
			: this.toggle

		this.expander.classList.add(this.classes.opened)
		this.hidden.style.maxHeight = `${this._maxHeight}px`
		toggleText.innerText = this.text.expanded
	}

	collapse() {
		const toggleText = this.selectors.toggleText
			? this.expander.querySelector(this.selectors.toggleText)
			: this.toggle

		this.expander.classList.remove(this.classes.opened)
		this.hidden.style.maxHeight = `${this._minHeight}px`
		toggleText.innerText = this.text.collapsed
	}

	expandHandler() {
		if (!this.expander.classList.contains(this.classes.opened)) {
			this.expand()
		}
	}

	collapseHandler() {
		if (this.expander.classList.contains(this.classes.opened)) {
			this.collapse()
		}
	}
}
