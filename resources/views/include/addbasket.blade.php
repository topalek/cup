<script>
  $(document).ready(function () {
    $('.inCartKor').click(function (event) {
        event.preventDefault()
        let id = $(this).data('id')
        let pr = $(this).data('pr')
        let url = ''
        addToCartFun(id,pr,url)
    })
    $('.inCartOne').click(function (event) {
        event.preventDefault()
        let id = $(this).data('id')
        let pr = $(this).data('pr')
        let url = $(this).data('href');
        addToCartFun(id,pr,url)
    })
  })
  function addToCartFun($id,$pr,$url) {
    let total = parseInt($('.cart-counter').text())
    total++
    $('.cart-counter').text(total)
    //console.log(total)
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{route('addToCart')}}",
      type: "POST",
      dataType: 'json',
      data: {
          id: $id,
          pr: $pr,
      },
      success: (data) => {
          //console.log(data)
          if($url!=''){
            window.location.href = $url;
          }
      },
      error: (data) => {
          //console.log(data)
      }
    });
  }
</script>