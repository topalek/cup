$(".respond").on("click", function () {
    $(".modal-response").addClass("modal-response--active");
    $("body").addClass("overflow");
});
$(".modal-response .order-link, .modal-response .btn-close").on(
    "click",
    function () {
        $(".modal-response").removeClass("modal-response--active");
        $("body").removeClass("overflow");
    }
);
