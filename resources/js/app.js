require('./bootstrap');

$(".compos-kid__item").on("click", function () {
  let tabId = $(this).attr("data-id");
  let tabRight = $(".compos-kid__bottom");
  let selected = tabRight.find("[data-id=" + tabId + "]");

  $(".compos-kid__item--active").removeClass("compos-kid__item--active");
  $(this).addClass("compos-kid__item--active");

  tabRight
    .find(".compos-kid__box--active")
    .removeClass("compos-kid__box--active");

  selected.addClass("compos-kid__box--active");
});

const isWhite = $('.header').hasClass('header-white');  // белый ли хедер
window.addEventListener("scroll", (e) => {
    if (window.scrollY > 80) {
        $('.header').addClass('scroll');
        $('.header').removeClass('header-white');
        $('.header').addClass('header-dark');
    } else {
        $('.header').removeClass('scroll');
        if (isWhite) {
            $('.header').removeClass('header-dark');
            $('.header').addClass('header-white');
        }
    }
});

mobileMenu();
function mobileMenu() {
    $(document).on("click", ".burger", function () {
        $(document).find(".mobileMenu").addClass("mobileMenu--active");
    });
    $(document).on("click", ".btnClose", function () {
        $(document).find(".mobileMenu").removeClass("mobileMenu--active");
        $(document).find(".insideMenu").removeClass("insideMenu--active");
    });
    $(document).on("click", ".burger", function () {
        $(document).find(".insideMenu").toggleClass("insideMenu--active");
    });
    $(document).on("click", function (e) {
        if (!$(e.target).is(".lgotip, .logotip *")) {
            $(document).find(".insideMenu").removeClass("insideMenu--active");
        }
    });
}

// $(document).on("click", ".menu", function () {
//     $(this).toggleClass("menu--active");
// });

$(".menu-catalog").on("click", function () {
    $(".ready-solution").removeClass("menu--active");
    $(this).toggleClass("menu--active");
});
$(".ready-solution").on("click", function () {
    $(".menu-catalog").removeClass("menu--active");
    $(this).toggleClass("menu--active");
});

/* РАЗОБРАТЬ */
const events = new Swiper(".events__wp", {
    spaceBetween: 10,
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        680: {
            slidesPerView: 2,
        },
    },
    pagination: {
        el: ".events__pagination",
        clickable: true,
    },
});
const ready = new Swiper(".ready__wp", {
    slidesPerView: 3,
    spaceBetween: 42,
    pagination: {
        el: ".ready__pagination",
    },
    navigation: {
        nextEl: ".ready__button-next",
        prevEl: ".ready__button-prev",
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        680: {
            slidesPerView: 2,
        },
        1120: {
            slidesPerView: 3,
        },
    },
});
const wesee = new Swiper(".wesee__wp", {
    slidesPerView: 3,
    spaceBetween: 42,
    pagination: {
        el: ".wesee__pagination",
    },
    navigation: {
        nextEl: ".wesee__button-next",
        prevEl: ".wesee__button-prev",
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        680: {
            slidesPerView: 2,
        },
        1120: {
            slidesPerView: 3,
        },
    },
});

// Parallax slider on main
const property = new Swiper(".property__wp", {
    height: 400,
    autoHeight: true,
    slidesPerView: 1,
    spaceBetween: 30,
    effect: "fade",
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".property__next",
        prevEl: ".property__prev",
    },
});
const costEvent = new Swiper(".cost-event__wp", {
    effect: "fade",
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    simulateTouch: false,
    navigation: {
        nextEl: ".cost-event__next",
        // prevEl: ".swiper-button-prev",
    },
});
const info = new Swiper(".info__wp", {
    spaceBetween: 10,
    slidesPerView: 1,
    pagination: {
        el: ".info__pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".info__next",
        prevEl: ".info__prev",
    },
});

var describig = new Swiper(".description__mySwiper", {
    spaceBetween: 20,
    slidesPerView: 3,
    direction: "vertical",
    autoHeight: true,

    // autoHeight: true,
    // freeMode: true,
    // watchSlidesVisibility: true,
    // watchSlidesProgress: true,
});
var descrismall = new Swiper(".description__mySwiper2", {
    spaceBetween: 10,
    autoHeight: true,
    thumbs: {
        swiper: describig,
    },
});
var composekid = new Swiper(".compos-kid__wp", {
    breakpoints: {
        320: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 4,
        },
    },
});
const popular = new Swiper(".popular__wp", {
    slidesPerView: 3,
    spaceBetween: 42,
    pagination: {
        el: ".popular__pagination",
    },
    navigation: {
        nextEl: ".popular__button-next",
        prevEl: ".popular__button-prev",
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        680: {
            slidesPerView: 2,
        },
        1120: {
            slidesPerView: 3,
        },
    },
});
const watched = new Swiper(".watched__wp", {
    slidesPerView: 3,
    spaceBetween: 42,
    pagination: {
        el: ".watched__pagination",
    },
    navigation: {
        nextEl: ".watched__button-next",
        prevEl: ".watched__button-prev",
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        680: {
            slidesPerView: 2,
        },
        1120: {
            slidesPerView: 3,
        },
    },
});
const other = new Swiper(".other__wp", {
    slidesPerView: 3,
    // spaceBetween: 42,
    pagination: {
        el: ".other__pagination",
    },
    navigation: {
        nextEl: ".other__button-next",
        prevEl: ".other__button-prev",
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        850: {
            slidesPerView: 2,
        },
        1280: {
            slidesPerView: 3,
        },
    },
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

$(".premium__link").on("click", function () {
    $(".modal-event").addClass("modal-event--active");
    $("body").addClass("overflow");
});
$(".modal-event .order-link, .modal-event .btn-close").on("click", function () {
    $(".modal-event").removeClass("modal-event--active");
    $("body").removeClass("overflow");
});

// табы
$(document).on("click", ".qa", function () {
    $(this).toggleClass("item--active");
});


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

// модалка
$(".ask").on("click", function () {
    $(".modal-question").addClass("modal-question--active");
    $("body").addClass("overflow");
});
$(".modal-close-qw, .link-qw").on("click", function () {
    $(".modal-question").removeClass("modal-question--active");
    $("body").removeClass("overflow");
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
