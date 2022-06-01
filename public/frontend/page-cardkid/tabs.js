$(".composition")
    .find(".tabs-item")
    .on("click", function () {
        let tabId = $(this).attr("data-id");
        let tabBottom = $(".composition").find(".bottom");
        let selected = tabBottom.find("[data-id=" + tabId + "]");

        $(".tabs-item--active").removeClass("tabs-item--active");
        $(this).addClass("tabs-item--active");

        tabBottom
            .find(".composition-item--active")
            .removeClass("composition-item--active");

        selected.addClass("composition-item--active");
    });
// Модальное окно
$(".composition")
    .find(".select")
    .on("click", function () {
        $(".modal-composition").addClass("modal-composition--active");
        $("body").addClass("overflow");
    });
$(".modal-composition")
    .find(".modal-close")
    .on("click", function () {
        $(".modal-composition").removeClass("modal-composition--active");
        $("body").removeClass("overflow");
    });
$(".modal-composition")
    .find(".item")
    .on("click", function () {
        $(".modal-composition").removeClass("modal-composition--active");
        $("body").removeClass("overflow");
    });
