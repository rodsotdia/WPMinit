/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/js/main.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/main.js":
/*!***************************!*\
  !*** ./assets/js/main.js ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/* ---------\r\nLIBRARIES\r\n---------------*/\r\n// Swup + Debug Plugin (https://github.com/swup/swup) + GTAG Plugin (https://github.com/joshuaHallee/swup-gtag-plugin)\r\n// import Swup from \"swup\";\r\n// import SwupDebugPlugin from \"@swup/debug-plugin\";\r\n// import SwupGtagPlugin from \"swup-gtag-plugin\";\r\n\r\n// GSAP + ScrollTrigger (https://github.com/greensock/GSAP)\r\n// import { gsap } from \"gsap\";\r\n// import { ScrollTrigger } from \"gsap/ScrollTrigger.js\";\r\n// gsap.registerPlugin(ScrollTrigger);\r\n\r\n// Bowser (https://github.com/lancedikson/bowser)\r\n// import Bowser from \"bowser\";\r\n\r\n// Cookies (https://github.com/js-cookie/js-cookie)\r\n// import Cookies from \"js-cookie\";\r\n\r\n// Swiper (https://github.com/nolimits4web/swiper)\r\n// import Swiper, { Navigation, Pagination } from 'swiper';\r\n// import swiperStyles from 'swiper/swiper-bundle.min.css';\r\n// Swiper.use([Navigation, Pagination]);\r\n\r\n/*-------\r\nSCRIPTS\r\n\r\n- ONLOAD FUNCTIONS\r\n- RESIZE FUNCTIONS\r\n\r\n--------*/\r\n\r\n\r\n/*-------------------------\r\nONLOAD FUNCTIONS\r\n----------------------------------*/\r\n\r\nvar init = function() {\r\n    // ADD FUNCTIONS HERE\r\n}\r\nwindow.addEventListener('load', init);\r\n\r\n/*-------------------------\r\nRESIZE FUNCTIONS\r\n----------------------------------*/\r\n\r\n// Returns a function, that, as long as it continues to be invoked, will not\r\n// be triggered. The function will be called after it stops being called for\r\n// N milliseconds. If `immediate` is passed, trigger the function on the\r\n// leading edge, instead of the trailing.\r\n\r\nfunction debounce(func, wait, immediate) {\r\n\tvar timeout;\r\n\treturn function() {\r\n\t\tvar context = this, args = arguments;\r\n\t\tvar later = function() {\r\n\t\t\ttimeout = null;\r\n\t\t\tif (!immediate) func.apply(context, args);\r\n\t\t};\r\n\t\tvar callNow = immediate && !timeout;\r\n\t\tclearTimeout(timeout);\r\n\t\ttimeout = setTimeout(later, wait);\r\n\t\tif (callNow) func.apply(context, args);\r\n\t};\r\n};\r\n\r\nvar resizeFn = debounce(function() {\r\n    // ADD FUNCTIONS HERE\r\n}, 250);\r\n\r\nwindow.addEventListener('resize', resizeFn);\n\n//# sourceURL=webpack:///./assets/js/main.js?");

/***/ })

/******/ });