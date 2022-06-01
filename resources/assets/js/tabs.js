const changeTab = function (e, selector) {
  const allTab = Array.from(document.querySelectorAll(selector));
  const tab = e.target;
  if (tab.closest(selector)) {
    allTab.map((item) => item.classList.remove("active"));
    tab.closest(selector).classList.add("active");
  }
};
export default changeTab;

$(".compos-kid__item").on("click", function () {
  let tabId = $(this).attr("data-id");
  let tabRight = $(".compos-kid__bottom");
  let selected = tabRight.find("[data-id=" + tabId + "]");

  $(".compos-kid__item--active").removeClass("compos-kid__item--active");
  $(this).addClass("compos-kid__item--active");

  tabRight
    .find(".compos-kid__box--active")
    .removeClass("compos-kid__box--active");

  selected.addClass("compos-kid__box--active");
});

$(".tabs-item").on("click", function () {
  let tabId = $(this).attr("data-id");
  let tabRight = $(".bottom");
  let selected = tabRight.find("[data-id=" + tabId + "]");

  $(".tabs-item--active").removeClass("tabs-item--active");
  $(this).addClass("tabs-item--active");

  tabRight
    .find(".composition-item--active")
    .removeClass("composition-item--active");

  selected.addClass("composition-item--active");
});