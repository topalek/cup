$(".premium__link").on("click", function () {
    $(".modal-event").addClass("modal-event--active");
    $("body").addClass("overflow");
});
$(".modal-event .order-link, .modal-event .btn-close").on("click", function () {
    $(".modal-event").removeClass("modal-event--active");
    $("body").removeClass("overflow");
});
