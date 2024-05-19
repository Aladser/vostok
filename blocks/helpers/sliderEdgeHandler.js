export const sliderEdgeHandler = ({firstSlideClass = 'slider_first-slide', lastSlideClass = 'slider_last-slide'}) =>
	swiper => {
		if (swiper.isBeginning) {
			swiper.el.classList.add(firstSlideClass)
		} else {
			swiper.el.classList.remove(firstSlideClass)
		}

		if (swiper.isEnd) {
			swiper.el.classList.add(lastSlideClass)
		} else {
			swiper.el.classList.remove(lastSlideClass)
		}
	}
