// import 'swiper/css/bundle'
// swiper core styles
import 'swiper/css'
// modules styles
// import 'swiper/css/navigation'
// import 'swiper/css/pagination'

import Swiper, { Autoplay } from 'swiper';

class Slider {
	constructor() {
		this.init();
	}

	init() {
		this.heroSlider();
	}

	heroSlider() {
		$(".slider-home-hero").each(function(index, element){
			$(this).addClass("slider-home-hero-" + index);
			
			new Swiper(".slider-home-hero-" + index, {
				modules: [Autoplay],
				slidesPerView: 1,
				spaceBetween: 60,
				speed: 1600,
				autoplay: {
					delay: 2500,
					disableOnInteraction: false,
				},
				loop: true
			})
		})
	}
}

export default Slider;