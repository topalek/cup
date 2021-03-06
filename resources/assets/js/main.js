const gallery = new Swiper(".gallery", {
  slidesPerView: 3,
});
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

const isWhite = $(".header").hasClass("header-white"); // ?????????? ???? ??????????
window.addEventListener("scroll", (e) => {
  if (window.scrollY > 110) {
    $(".header").addClass("scroll");
    $(".header").removeClass("header-white");
    $(".header").addClass("header-dark");
  } else {
    $(".header").removeClass("scroll");
    if (isWhite) {
      $(".header").removeClass("header-dark");
      $(".header").addClass("header-white");
    }
  }
});

// ?????????? ???? ??????????, ?????????? ???????????????????????? ?????? ????????????, ?????????????? ?????????? ?????? id = modal_phone
if ($("#modal_phone").length) {
  $("#modal_phone").mask("+7 (000)-000-00-00", {});
}

// ?????????? ?????? - ???? ????????????, ?????????? ???????????????????????? ?????? ????????????, ?????????????? ?????????? ?????? id = guest_count

if ($("#guest_count").length) {
  let guestCount = document.querySelector("#guest_count");
  guestCount.addEventListener("input", function () {
    guestCount.value = guestCount.value.replace(/[^0-9]/g, "");
  });
}

// modals

// ?????????????? ???? ?????????????? ????????????????
$(".premium__link").on("click", function () {
  $(".modal-event").addClass("modal-event--active");
  $("body").addClass("overflow");
});

// ?????????????? ???? ???????????????? ??????????????
$(".giveFeed").on("click", function () {
  $(".modal-event").addClass("modal-event--active");
  $("body").addClass("overflow");
});

// ?????????????? ???? ???????????????? ???????????????? ??????????????????
$(".respond").on("click", function () {
  $(".modal-event").addClass("modal-event--active");
  $("body").addClass("overflow");
});

// ?????????????? ???? ???????????????? ???????????? ??????????
$(".ask").on("click", function () {
  $(".modal-event").addClass("modal-event--active");
  $("body").addClass("overflow");
});

// ???????????????? ?????????????????? ????????
/*$(".modal-event .order-link, .modal-event .btn-close").on("click", function () {
  $(".modal-event").removeClass("modal-event--active");
  $("body").removeClass("overflow");
});*/

// ???????????????? ?????????????????? ????????
$(".modal-event .btn-close").on("click", function () {
  $(".modal-event").removeClass("modal-event--active");
  $("body").removeClass("overflow");
});

// ?????????????????? input file
let fields = document.querySelectorAll(".field__file");
Array.prototype.forEach.call(fields, function (input) {
  let label = input.nextElementSibling,
    labelVal = label.querySelector(".field__file-fake").innerText;

  input.addEventListener("change", function (e) {
    let countFiles = "";
    if (this.files && this.files.length >= 1) countFiles = this.files.length;

    if (countFiles)
      label.querySelector(".field__file-fake").innerText =
        "?????????????? ????????????: " + countFiles;
    else label.querySelector(".field__file-fake").innerText = labelVal;
  });
});

// ???????????????? ?? ??????????????
$(".js-add-cart").on("click", function () {
  $(this).addClass("description__other-btn--active");
  $(this).text("?? ??????????????");
});
