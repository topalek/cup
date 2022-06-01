/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/assets/js/tabs.js ***!
  \*************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var changeTab = function changeTab(e, selector) {
  var allTab = Array.from(document.querySelectorAll(selector));
  var tab = e.target;

  if (tab.closest(selector)) {
    allTab.map(function (item) {
      return item.classList.remove("active");
    });
    tab.closest(selector).classList.add("active");
  }
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (changeTab);
$(".compos-kid__item").on("click", function () {
  var tabId = $(this).attr("data-id");
  var tabRight = $(".compos-kid__bottom");
  var selected = tabRight.find("[data-id=" + tabId + "]");
  $(".compos-kid__item--active").removeClass("compos-kid__item--active");
  $(this).addClass("compos-kid__item--active");
  tabRight.find(".compos-kid__box--active").removeClass("compos-kid__box--active");
  selected.addClass("compos-kid__box--active");
});
$(".tabs-item").on("click", function () {
  var tabId = $(this).attr("data-id");
  var tabRight = $(".bottom");
  var selected = tabRight.find("[data-id=" + tabId + "]");
  $(".tabs-item--active").removeClass("tabs-item--active");
  $(this).addClass("tabs-item--active");
  tabRight.find(".composition-item--active").removeClass("composition-item--active");
  selected.addClass("composition-item--active");
});
/******/ })()
;