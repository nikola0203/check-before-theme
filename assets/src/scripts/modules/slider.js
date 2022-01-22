// import 'swiper/css/bundle'
// swiper core styles
import 'swiper/css'
// modules styles
import 'swiper/css/navigation'
// import 'swiper/css/pagination'

import Swiper, { Navigation, Pagination } from 'swiper';

class Slider {
	constructor() {
		this.init();
	}

	init() {
		this.testimonialSlider();
	}

	testimonialSlider() {
		$(".testimonials__slider").each(function(index, element){
			$(this).addClass("testimonials__slider-" + index);
			$(this).find(".swiper-button-prev").addClass("swiper-button-prev-" + index);
			$(this).find(".swiper-button-next").addClass("swiper-button-next-" + index);
			
			new Swiper(".testimonials__slider-" + index, {
				modules: [Navigation, Pagination],
				slidesPerView: 1,
				spaceBetween: 60,
				loop: true,
				navigation: {
					nextEl: ".swiper-button-next-" + index,
					prevEl: ".swiper-button-prev-" + index,
				},
				breakpoints: {
					1140: {
						slidesPerView: 2,
						// spaceBetween: 60,
					}
				}
			});
		});
	}
}

export default Slider;