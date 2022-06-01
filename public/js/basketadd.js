/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/assets/js/basketadd.js ***!
  \******************************************/
function addToCart($id, $pr, $url) {
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "{{route('addToCart')}}",
    type: "POST",
    dataType: 'json',
    data: {
      id: $id,
      pr: $pr
    },
    success: function success(data) {
      console.log(data);

      if ($url != '') {
        window.location.href = $url;
      }
    },
    error: function error(data) {
      console.log(data);
    }
  });
}

$(document).ready(function () {
  $('.inCart').click(function (event) {
    event.preventDefault();
    var id = $(this).data('id');
    var pr = $(this).data('pr');
    var url = '';
    addToCart(id, pr, url);
  });
  $('.inCartOne').click(function (event) {
    event.preventDefault();
    var id = $(this).data('id');
    var pr = $(this).data('pr');
    var url = $(this).data('href');
    addToCart(id, pr, url);
  });
});
/******/ })()
;