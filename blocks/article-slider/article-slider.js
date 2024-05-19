import './article-slider.mustache'

import { Swiper } from 'swiper'
import { Navigation, Thumbs} from 'swiper/modules'

export default () => {
    const sliders = document.querySelectorAll('.article-slider');

    sliders.forEach((item, i) => {
        const slider = item.querySelector('.article-slider-block');
        const nextSlide = item.querySelector('.article-slider-arrow_next');
        const prevSlide = item.querySelector('.article-slider-arrow_prev');
        const imgs = item.querySelectorAll('.article-slider-slide__img');

        const sliderThumbs = item.querySelector('.article-slider-thumbs-slider');
        const nextSlideThumbs = item.querySelector('.article-slider-thumbs-arrow_next');
        const prevSlideThumbs = item.querySelector('.article-slider-thumbs-arrow_prev');

        imgs.forEach((item) => {
            item.setAttribute('data-fancybox', `article-slider-gallery${i}`);
        });

        const slThumb = new Swiper(sliderThumbs, {
            modules: [ Navigation ],
            slidesPerView: 5,
            spaceBetween: 5,
            watchOverflow: true,
            navigation: {
                prevEl: prevSlideThumbs,
                nextEl: nextSlideThumbs,
            },
            breakpoints: {
                768: {
                    slidesPerView: 'auto',
                    spaceBetween: 8,
                },
                1280: {
                    spaceBetween: 10,
                }
            }
        });

        const sl = new Swiper(slider, {
            modules: [ Navigation, Thumbs],
            watchOverflow: true,
            navigation: {
                nextEl: nextSlide,
                prevEl: prevSlide
            },
            spaceBetween: 48,
            thumbs: {
                swiper: slThumb
            },
        });
    });

}