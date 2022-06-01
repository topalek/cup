$(document).on("click", ".data-select", function () {
  $(this).toggleClass("data-select--active");
});
$(document).on("click", ".data-select__item", function () {
  let text = $(this).text();
  $(this).parents(".data-select").find(".top").text(text);
});

// new js
$(".basket__row-button").on("click", function () {
  $(this)
    .parents(".basket__row")
    .find(".compos-kid__list")
    .toggleClass("compos-kid__list--active");
  $(this).toggleClass("basket__row-button--active");
});

// маски на поля
$(".counter__input, .sum-count__input, .js-guest-count").on(
  "input",
  function () {
    this.value = this.value.replace(/[^0-9\.]/g, "");
  }
);
$(".input-group--phone").mask("+7 (000)-000-00-00", {});

// счетчики
$(".basket__item-count .subt").on("click", function () {
  let inputValue = +$(this).parents(".counter").find(".counter__input").val();
  if (inputValue > 0) {
    $(this)
      .parents(".counter")
      .find(".counter__input")
      .val(inputValue - 1);
  } else {
    $(this).parents(".counter").find(".counter__input").val(0);
  }
});
$(".basket__item-count .add").on("click", function () {
  let inputValue = +$(this).parents(".counter").find(".counter__input").val();
  $(this)
    .parents(".counter")
    .find(".counter__input")
    .val(inputValue + 1);
});
// ==============================
$(".sum-count__subt").on("click", function () {
  let inputValue = +$(this)
    .parents(".sum-count__counter")
    .find(".sum-count__input")
    .val();
  if (inputValue > 0) {
    $(this)
      .parents(".sum-count__counter")
      .find(".sum-count__input")
      .val(inputValue - 1);
  } else {
    $(this).parents(".sum-count__counter").find(".sum-count__input").val(0);
  }
});
$(".sum-count__add").on("click", function () {
  let inputValue = +$(this)
    .parents(".sum-count__counter")
    .find(".sum-count__input")
    .val();
  $(this)
    .parents(".sum-count__counter")
    .find(".sum-count__input")
    .val(inputValue + 1);
});

// Выбор города
$(".js-select-city").on("click", function () {
  $(".js-input-city").val($(this).text());
});
$(".js-select-clear").on("click", function () {
  $(".js-input-city").val("");
});

// модалки
$(".compos-kid__change").on("click", function () {
  $(".modal--replace").addClass("modal--active");
  $("body").addClass("overflow");
});
$(".modal__close").on("click", function () {
  $(".modal").removeClass("modal--active");
  $("body").removeClass("overflow");
});
$(".compos-kid__addbtn").on("click", function () {
  $(".modal--add").addClass("modal--active");
  $("body").addClass("overflow");
});
