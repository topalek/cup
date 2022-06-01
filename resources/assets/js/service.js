$(".categories__tab").on("click", function () {
  let tabId = $(this).attr("data-id");
  let tabBottom = $(".categories__bottom");
  let selected = tabBottom.find("[data-id=" + tabId + "]");
  $(".categories__tab--active").removeClass("categories__tab--active");
  $(this).addClass("categories__tab--active");
  tabBottom
    .find(".categories__bottom-item--active")
    .removeClass("categories__bottom-item--active");
  selected.addClass("categories__bottom-item--active");
});
