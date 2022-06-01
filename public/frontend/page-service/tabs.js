$(".category__tab").on("click", function () {
    $(".category__tab").removeClass("category__tab--active");
    $(this).addClass("category__tab--active");
});
$(".category-format").on("click", function () {
    $(".category__items--active").removeClass("category__items--active");
    $(".category__items--1").addClass("category__items--active");
    $(".category__items--2-mobile").hide();
});
$(".category-occasion").on("click", function () {
    $(".category__items--active").removeClass("category__items--active");
    if ($(window).width() > 1080) {
        $(".category__items--2-desctop").addClass("category__items--active");
        $(".category__items--2-mobile").removeClass("category__items--active");
    } else {
        $(".category__items--2-mobile").show();
    }
});
