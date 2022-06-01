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
