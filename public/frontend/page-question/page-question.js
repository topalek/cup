// $(".question")
//   .find(".item")
//   .find(".bottom")
//   .on("click", function () {
//     $(this).parents(".item").find(".item").toggleClass("item--active");
//   });

// табы
$(document).on("click", ".qa", function () {
    $(this).toggleClass("item--active");
});

// загрузка файла
let fields = document.querySelectorAll(".field__file");
Array.prototype.forEach.call(fields, function (input) {
    let label = input.nextElementSibling,
        labelVal = label.querySelector(".field__file-fake").innerText;

    input.addEventListener("change", function (e) {
        let countFiles = "";
        if (this.files && this.files.length >= 1)
            countFiles = this.files.length;

        if (countFiles)
            label.querySelector(".field__file-fake").innerText =
                "Выбрано файлов: " + countFiles;
        else label.querySelector(".field__file-fake").innerText = labelVal;
    });
});

// модалка
$(".ask").on("click", function () {
    $(".modal-question").addClass("modal-question--active");
    $("body").addClass("overflow");
});
$(".modal-close-qw, .link-qw").on("click", function () {
    $(".modal-question").removeClass("modal-question--active");
    $("body").removeClass("overflow");
});
