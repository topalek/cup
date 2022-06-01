<script>
  $(".basket__item-count .subt").on("click", function () {
  let id = $(this).data('id');
  let pr = $(this).data('pr');
  let total = parseInt($('.cart-counter').text());
  
  let summprod = parseInt($('.summ_'+id).text());
  let cenaprod = parseInt($('.cena_'+id).text());
  //console.log(summprod);

  let inputValue = +$(this).parents(".counter").find(".counter__input").val();
  if (inputValue > 1) {
    $(this)
      .parents(".counter")
      .find(".counter__input")
      .val(inputValue - 1);
      //уменьшение количества 
      total--;
      updateToCartBask(id,inputValue - 1);
      $('.cart-counter').text(total);
      $('.summ_'+id).text(summprod-cenaprod);

      $sum=$("div").find(`[data-price="1"]`);
      $sumend=0;
      for(var i=0; i < $sum.length; i++) {
          $el = $sum[i].innerText;
          $sumend+=Number($el.replace(/[^0-9]/g,""));
      }
      $obsum=$("div").find(`[data-price="2"]`);
      $obsum[0].innerHTML='ИТОГО: '+$sumend+' <span>руб.</span>';


  } else {
    $(this).parents(".counter").find(".counter__input").val(1);
  }
});
$(".basket__item-count .add").on("click", function () {
  let id = $(this).data('id');
  let pr = $(this).data('pr');
  let total = parseInt($('.cart-counter').text());

  let summprod = parseInt($('.summ_'+id).text());
  let cenaprod = parseInt($('.cena_'+id).text());
  //console.log(summprod);

  let inputValue = +$(this).parents(".counter").find(".counter__input").val();
  $(this)
    .parents(".counter")
    .find(".counter__input")
    .val(inputValue + 1);
    //увеличение количества 
    total++;
    updateToCartBask(id,inputValue + 1);
    $('.cart-counter').text(total);
    $('.summ_'+id).text(summprod+cenaprod);

    $sum=$("div").find(`[data-price="1"]`);
      $sumend=0;
      for(var i=0; i < $sum.length; i++) {
          $el = $sum[i].innerText;
          $sumend+=Number($el.replace(/[^0-9]/g,""));
      }
      $obsum=$("div").find(`[data-price="2"]`);
      $obsum[0].innerHTML='ИТОГО: '+$sumend+' <span>руб.</span>';
});
//Функция добавления товара в корзину
function updateToCartBask($id,$quantity) {
  $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "{{route('updateCart')}}",
    type: "POST",
    dataType: 'json',
    data: {
        id: $id,
        quantity: $quantity,
    },
    success: (data) => {
        //console.log(data)
    },
    error: (data) => {
        //console.log(data)
    }
  });
}
</script>