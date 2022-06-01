$(".menu-catalog").on("click", function () {
    $(".ready-solution").removeClass("menu--active");
    $(this).toggleClass("menu--active");
});
$(".ready-solution").on("click", function () {
    $(".menu-catalog").removeClass("menu--active");
    $(this).toggleClass("menu--active");
});
