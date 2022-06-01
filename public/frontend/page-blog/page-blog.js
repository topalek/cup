$(document)
  .find(".select")
  .on("click", ".top", function () {
    $(".select").addClass("select--active");
  });
$(document).on("click", ".select__item", function () {
  $(document).find(".select").removeClass("select--active");
  let text = $(this).text();
  $(this).parents(".select").find(".top").text(text);
});
