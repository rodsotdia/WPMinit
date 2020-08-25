/* ---------
LIBRARIES
---------------*/
// Swup + Debug Plugin (https://github.com/swup/swup) + GTAG Plugin (https://github.com/joshuaHallee/swup-gtag-plugin)
// import Swup from "swup";
// import SwupDebugPlugin from "@swup/debug-plugin";
// import SwupGtagPlugin from "swup-gtag-plugin";

// GSAP + ScrollTrigger (https://github.com/greensock/GSAP)
// import { gsap } from "gsap";
// import { ScrollTrigger } from "gsap/ScrollTrigger.js";
// gsap.registerPlugin(ScrollTrigger);

// Bowser (https://github.com/lancedikson/bowser)
// import Bowser from "bowser";

// Cookies (https://github.com/js-cookie/js-cookie)
// import Cookies from "js-cookie";

// Swiper (https://github.com/nolimits4web/swiper)
// import Swiper, { Navigation, Pagination } from 'swiper';
// import swiperStyles from 'swiper/swiper-bundle.min.css';
// Swiper.use([Navigation, Pagination]);

/*-------
SCRIPTS

- ONLOAD FUNCTIONS
- RESIZE FUNCTIONS

--------*/


/*-------------------------
ONLOAD FUNCTIONS
----------------------------------*/

var init = function() {
    // ADD FUNCTIONS HERE
}
window.addEventListener('load', init);

/*-------------------------
RESIZE FUNCTIONS
----------------------------------*/

// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

var resizeFn = debounce(function() {
    // ADD FUNCTIONS HERE
}, 250);

window.addEventListener('resize', resizeFn);