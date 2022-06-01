$(document).on("click", ".data-select", function () {
  $(this).toggleClass("data-select--active");
});
$(document).on("click", ".data-select__item", function () {
  let text = $(this).text();
  $(this).parents(".data-select").find(".top").text(text);
    $(this).parents('.data-select').find('.data-select__input').val(text)
});
