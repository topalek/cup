/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/assets/js/service.js ***!
  \****************************************/
$(".categories__tab").on("click", function () {
  var tabId = $(this).attr("data-id");
  var tabBottom = $(".categories__bottom");
  var selected = tabBottom.find("[data-id=" + tabId + "]");
  $(".categories__tab--active").removeClass("categories__tab--active");
  $(this).addClass("categories__tab--active");
  tabBottom.find(".categories__bottom-item--active").removeClass("categories__bottom-item--active");
  selected.addClass("categories__bottom-item--active");
});
/******/ })()
;