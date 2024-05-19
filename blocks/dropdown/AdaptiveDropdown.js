import { Dropdown } from './Dropdown'

export class AdaptiveDropdown extends Dropdown {
	init() {
		super.init()

		this.checkResolution()
	}

	attachEvents() {
		super.attachEvents()

		this.params.resizeTimer = -1
		window.addEventListener('resize', this.windowResizeHandler.bind(this))
	}

	windowResizeHandler(event) {
		clearTimeout(this.params.resizeTimer)

		this.params.resizeTimer = setTimeout(() => {
			this.checkResolution()
		}, 250)
	}

	checkResolution() {
		const VPWidth = window.innerWidth

		if (this.params.minWidth && !this.params.maxWidth) {
			this.params._active = VPWidth >= this.params.minWidth
		}

		if (this.params.maxWidth && !this.params.minWidth) {
			this.params._active = VPWidth < this.params.maxWidth
		}

		if (this.params.maxWidth && this.params.minWidth) {
			this.params._active =
				VPWidth < this.params.maxWidth &&
				VPWidth >= this.params.minWidth
		}
	}
}
