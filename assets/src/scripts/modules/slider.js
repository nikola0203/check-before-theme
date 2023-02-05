// import 'swiper/css/bundle'
// swiper core styles
import 'swiper/css'
// modules styles
// import 'swiper/css/pagination'
import 'swiper/css/scrollbar'

import Swiper, { Autoplay, Scrollbar } from 'swiper';

class Slider {
	constructor() {
		this.init();
	}

	init() {
    const thisClass = this

    window.addEventListener('load', function(){
			thisClass.heroSlider()
			thisClass.featuresList()
			thisClass.featuresListNav()
		})
	}

	heroSlider() {
		const sliders = document.querySelectorAll('.slider-home-hero')

		sliders.forEach(function(slider, index) {
			slider.classList.add("slider-home-hero-" + index)

			let	speed = parseInt(slider.dataset.speed),
					autoplay_delay = parseInt(slider.dataset.autoplay_delay)

			new Swiper(".slider-home-hero-" + index, {
				modules: [Autoplay],
				slidesPerView: 1,
				spaceBetween: 60,
				loop: true,
				speed: speed,
				autoplay: {
					delay: autoplay_delay,
					disableOnInteraction: false,
				}
			})
		})
	}

	featuresListNav() {
		const sliders_tab = document.querySelectorAll('.slider-nav-features-list')

		sliders_tab.forEach(function(sliders_tab, index) {
			sliders_tab.classList.add("slider-nav-features-list-" + index)
			
			let features_nav_tab = new Swiper(".slider-nav-features-list-" + index, {
				modules: [Scrollbar],
				slidesPerView: "auto",
				spaceBetween: 30,
				autoHeight: true,
				scrollbar: {
					el: ".swiper-scrollbar",
					draggable: true,
					hide: false,
				},
			})
		})
	}

	featuresList() {
		const sliders_tab = document.querySelectorAll('.slider-features-tab')

		sliders_tab.forEach(function(sliders_tab, index) {
			sliders_tab.classList.add("slider-features-tab-" + index)
			
			let features_tab = new Swiper(".slider-features-tab-" + index, {
				modules: [Scrollbar],
				slidesPerView: "auto",
				spaceBetween: 30,
				autoHeight: true,
				scrollbar: {
					el: ".swiper-scrollbar",
					draggable: true,
					hide: false,
				},
			})
		})
	}
}

export default Slider;