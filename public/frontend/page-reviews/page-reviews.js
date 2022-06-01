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
$(".giveFeed").on("click", function () {
    $(".modal-reviews").addClass("modal-reviews--active");
    $("body").addClass("overflow");
});
$(".modal-close-rew, .link-rew").on("click", function () {
    $(".modal-reviews").removeClass("modal-reviews--active");
    $("body").removeClass("overflow");
});
