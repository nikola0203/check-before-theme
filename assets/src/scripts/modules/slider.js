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
			$(this).addClass("slider-home-hero-" + index)

			let speed = $(this).data('speed'),
					autoplay_delay = $(this).data('autoplay_delay')
			
			new Swiper(".slider-home-hero-" + index, {
				modules: [Autoplay],
				slidesPerView: 1,
				spaceBetween: 60,
				loop: true,
				speed: speed,
				autoplay: {
					delay: autoplay_delay,
					disableOnInteraction: false,
				},
			})
		})
	}
}

export default Slider;