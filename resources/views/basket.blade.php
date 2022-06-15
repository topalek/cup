@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/basket/styles.css">
@endsection

@section('title')
    <title>{{$page->title}}</title>
@endsection
@section('description')
    <meta name="description" content="{{strip_tags($page->description)}}">
@endsection
@section('keywords')
    <meta name="keywords" content="{{$page->keywords}}">
@endsection

@section('scripts')
    @include('include.addprbasket')
    <script src="/js/basket.js"></script>
    <script>
        $(document).ready(function () {

            $('.compos-kid__remove').click(function (event) {
                event.preventDefault()
                let id = $(this).data('id')
                removeCart(id)
                /*вычетание из товаров*/
                let total = parseInt($('.cart-counter').text())
                let totalitem = parseInt($('.counter_'+id)[0].value)
                $('.cart-counter').text(total-totalitem)
            })

            $sum=$("div").find(`[data-price="1"]`);
            $sumend=0;
            for(var i=0; i < $sum.length; i++) {
                $el = $sum[i].innerText;
                $sumend+=Number($el.replace(/[^0-9]/g,""));
            }

            $obsum=$("div").find(`[data-price="2"]`);
            $obsum[0].innerHTML='ИТОГО: '+$sumend+' <span>руб.</span>';
            //console.log($obsum)
        })

        document.querySelector('[data-order-create]').addEventListener('click',e=>{
            e.preventDefault()
            document.querySelector('[data-order-form]').submit();
        })
        function removeCart($id) {



          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "{{route('removeCart')}}",
              type: "POST",
              dataType: 'json',
              data: {
                  id: $id,
              },
              success: (data) => {
                    $("div").find(`[data-idcode='${$id}']`).remove();
                    $sum=$("div").find(`[data-price="1"]`);
                    $sumend=0;
                    for(var i=0; i < $sum.length; i++) {
                        $el = $sum[i].innerText;
                        $sumend+=Number($el.replace(/[^0-9]/g,""));
                    }
                    $obsum=$("div").find(`[data-price="2"]`);
                    $obsum[0].innerHTML='ИТОГО: '+$sumend+' <span>руб.</span>';
                    //console.log(data)
              },
              error: (data) => {
                  //console.log(data)
              }
          });
        }
    </script>

@endsection


@section('content')
  <main class="padding">
    <section class="basket">
      <div class="container">
        <h1 class="basket-title">{{$page->title}}</h1>
        <div id="basketcont" class="basket__table">
          <div class="basket__row">
            <div class="basket__row-wrap">
              <div class="basket__row-title basket__row-title--bigs">
                ТОВАР
              </div>
              <div class="basket__row-title">Цена</div>
              <div class="basket__row-title">кол-во</div>
              <div class="basket__row-title">вес</div>
              <div class="basket__row-title">сумма</div>
            </div>
          </div>
          @if($cartItems!=null)
            @foreach($cartItems as $cartItem)
            <div class="basket__row basket__row--padding" data-idcode="{{$cartItem->id}}">
              <div class="basket__row-wrap">
                <div class="basket__inner basket__item--bigs">
                  <div class="basket__image">
                    <img
                      class="basket__img"
                      src="{{$cartItem->attributes->img}}"
                      alt="{{$cartItem->attributes->imgalt}}"
                    />
                  </div>
                  <div class="basket__text">
                      {{$cartItem->name}}
                  </div>
                </div>
                <div class="basket__item basket__item-price"><span class="cena_{{$cartItem->id}}">{{$cartItem->price}}</span> руб.</div>
                <div class="basket__item basket__item-count">
                  <div class="counter">
                    <button class="subt" data-id="{{$cartItem->id}}" data-pr="{{$cartItem->attributes->pr}}">-</button>
                    <input class="counter__input counter_{{$cartItem->id}}" disabled type="text" value="{{$cartItem->quantity}}"  />
                    <button class="add" data-id="{{$cartItem->id}}" data-pr="{{$cartItem->attributes->pr}}">+</button>
                  </div>
                </div>
                <div class="basket__item basket__item-weight">{{$cartItem->attributes->weight}} гр.</div>
                <?php $summ=($cartItem->quantity)*($cartItem->price)?>
                <div class="basket__item basket__item-sum" data-price="1"><span class="summ_{{$cartItem->id}}">{{$summ}}</span> руб.</div>
                <button class="compos-kid__remove" data-id="{{$cartItem->id}}" >
                  <svg
                    width="27"
                    height="27"
                    viewBox="0 0 27 27"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                      >
                    <path
                      d="M6.75 21.375C6.75 22.6125 7.7625 23.625 9 23.625H18C19.2375 23.625 20.25 22.6125 20.25 21.375V7.875H6.75V21.375ZM9 10.125H18V21.375H9V10.125ZM17.4375 4.5L16.3125 3.375H10.6875L9.5625 4.5H5.625V6.75H21.375V4.5H17.4375Z"
                      fill="white"
                    />
                  </svg>
                </button>
              </div>
              @if(($cartItem->attributes->pr)!='product')
              <div class="basket__row-button">
                Показать список блюд
                <svg
                  width="15"
                  height="9"
                  viewBox="0 0 15 9"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M7.00028 8.00003C6.76662 8.00049 6.54019 7.91911 6.36028 7.77003L0.360276 2.77003C0.156059 2.60029 0.0276347 2.35638 0.00325494 2.09196C-0.0211248 1.82753 0.0605371 1.56425 0.230276 1.36003C0.400014 1.15581 0.643926 1.02739 0.908352 1.00301C1.17278 0.978631 1.43606 1.06029 1.64028 1.23003L7.00028 5.71003L12.3603 1.39003C12.4626 1.30697 12.5803 1.24493 12.7066 1.2075C12.8329 1.17007 12.9654 1.15798 13.0965 1.17192C13.2275 1.18586 13.3545 1.22555 13.4701 1.28873C13.5857 1.3519 13.6878 1.4373 13.7703 1.54003C13.8619 1.64285 13.9312 1.76348 13.974 1.89435C14.0168 2.02523 14.0321 2.16353 14.019 2.30059C14.0058 2.43765 13.9645 2.57053 13.8976 2.69088C13.8307 2.81124 13.7397 2.91649 13.6303 3.00003L7.63028 7.83003C7.44519 7.95555 7.22338 8.0154 7.00028 8.00003Z"
                    fill="black"
                  />
                </svg>
              </div>
              <ul class="compos-kid__list">
                <?php echo $cartItem->attributes?>
                @if(isset($cartItem->attributes->sp1))
                  1
                @endif
                @if(isset($cartItem->attributes->sp2))
                  2
                @endif
                @if(isset($cartItem->attributes->sp3))
                  3
                @endif
                @if(isset($cartItem->attributes->sp4))
                  4
                @endif
                @if(isset($cartItem->attributes->sp5))
                  5
                @endif
                <!--div class="compos-kid__item active">
                  <li class="compos-kid__list-item">
                    1.Ролл из опалённого на ольхе лосося с пряным сыром
                  </li>
                  <div class="compos__box">
                    <div class="sum-count">
                      <div class="sum-count__counter">
                        <button class="sum-count__subt">-</button>
                        <div class="sum-count__count">10</div>
                        <button class="sum-count__add">+</button>
                      </div>
                    </div>
                    <div class="compos-sum">10.000 руб.</div>
                  </div>
                  <div class="compos-kid__buttons">
                    <button class="compos-kid__change">
                      <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M18.5 2.49998C18.8978 2.10216 19.4374 1.87866 20 1.87866C20.5626 1.87866 21.1022 2.10216 21.5 2.49998C21.8978 2.89781 22.1213 3.43737 22.1213 3.99998C22.1213 4.56259 21.8978 5.10216 21.5 5.49998L12 15L8 16L9 12L18.5 2.49998Z"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>
                    <button class="compos-kid__remove">
                      <svg
                        width="27"
                        height="27"
                        viewBox="0 0 27 27"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M6.75 21.375C6.75 22.6125 7.7625 23.625 9 23.625H18C19.2375 23.625 20.25 22.6125 20.25 21.375V7.875H6.75V21.375ZM9 10.125H18V21.375H9V10.125ZM17.4375 4.5L16.3125 3.375H10.6875L9.5625 4.5H5.625V6.75H21.375V4.5H17.4375Z"
                          fill="white"
                        />
                      </svg>
                    </button>
                  </div>
                </div-->
                <!--div class="compos-kid__item">
                  <li class="compos-kid__list-item">
                    2.Тигровые креветки в соусе манго с маракуйей
                  </li>
                  <div class="compos__box">
                    <div class="sum-count">
                      <div class="sum-count__counter">
                        <button class="sum-count__subt">-</button>
                        <div class="sum-count__count">10</div>
                        <button class="sum-count__add">+</button>
                      </div>
                    </div>
                    <div class="compos-sum">10.000 руб.</div>
                  </div>
                  <div class="compos-kid__buttons">
                    <button class="compos-kid__change">
                      <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M18.5 2.49998C18.8978 2.10216 19.4374 1.87866 20 1.87866C20.5626 1.87866 21.1022 2.10216 21.5 2.49998C21.8978 2.89781 22.1213 3.43737 22.1213 3.99998C22.1213 4.56259 21.8978 5.10216 21.5 5.49998L12 15L8 16L9 12L18.5 2.49998Z"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>
                    <button class="compos-kid__remove">
                      <svg
                        width="27"
                        height="27"
                        viewBox="0 0 27 27"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M6.75 21.375C6.75 22.6125 7.7625 23.625 9 23.625H18C19.2375 23.625 20.25 22.6125 20.25 21.375V7.875H6.75V21.375ZM9 10.125H18V21.375H9V10.125ZM17.4375 4.5L16.3125 3.375H10.6875L9.5625 4.5H5.625V6.75H21.375V4.5H17.4375Z"
                          fill="white"
                        />
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="compos-kid__item">
                  <li class="compos-kid__list-item">
                    3.Томлёный ростбиф с травами в соусе вителло тонатой
                  </li>
                  <div class="compos__box">
                    <div class="sum-count">
                      <div class="sum-count__counter">
                        <button class="sum-count__subt">-</button>
                        <div class="sum-count__count">10</div>
                        <button class="sum-count__add">+</button>
                      </div>
                    </div>
                    <div class="compos-sum">10.000 руб.</div>
                  </div>
                  <div class="compos-kid__buttons">
                    <button class="compos-kid__change">
                      <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M18.5 2.49998C18.8978 2.10216 19.4374 1.87866 20 1.87866C20.5626 1.87866 21.1022 2.10216 21.5 2.49998C21.8978 2.89781 22.1213 3.43737 22.1213 3.99998C22.1213 4.56259 21.8978 5.10216 21.5 5.49998L12 15L8 16L9 12L18.5 2.49998Z"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>
                    <button class="compos-kid__remove">
                      <svg
                        width="27"
                        height="27"
                        viewBox="0 0 27 27"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M6.75 21.375C6.75 22.6125 7.7625 23.625 9 23.625H18C19.2375 23.625 20.25 22.6125 20.25 21.375V7.875H6.75V21.375ZM9 10.125H18V21.375H9V10.125ZM17.4375 4.5L16.3125 3.375H10.6875L9.5625 4.5H5.625V6.75H21.375V4.5H17.4375Z"
                          fill="white"
                        />
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="compos-kid__item">
                  <li class="compos-kid__list-item">
                    4.Вяленый томат с сыром Рикотта
                  </li>
                  <div class="compos__box">
                    <div class="sum-count">
                      <div class="sum-count__counter">
                        <button class="sum-count__subt">-</button>
                        <div class="sum-count__count">10</div>
                        <button class="sum-count__add">+</button>
                      </div>
                    </div>
                    <div class="compos-sum">10.000 руб.</div>
                  </div>
                  <div class="compos-kid__buttons">
                    <button class="compos-kid__change">
                      <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M18.5 2.49998C18.8978 2.10216 19.4374 1.87866 20 1.87866C20.5626 1.87866 21.1022 2.10216 21.5 2.49998C21.8978 2.89781 22.1213 3.43737 22.1213 3.99998C22.1213 4.56259 21.8978 5.10216 21.5 5.49998L12 15L8 16L9 12L18.5 2.49998Z"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>
                    <button class="compos-kid__remove">
                      <svg
                        width="27"
                        height="27"
                        viewBox="0 0 27 27"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M6.75 21.375C6.75 22.6125 7.7625 23.625 9 23.625H18C19.2375 23.625 20.25 22.6125 20.25 21.375V7.875H6.75V21.375ZM9 10.125H18V21.375H9V10.125ZM17.4375 4.5L16.3125 3.375H10.6875L9.5625 4.5H5.625V6.75H21.375V4.5H17.4375Z"
                          fill="white"
                        />
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="compos-kid__item">
                  <li class="compos-kid__list-item">
                    5.Тартар из тунца с клубникой и сегментом апельсина
                  </li>
                  <div class="compos__box">
                    <div class="sum-count">
                      <div class="sum-count__counter">
                        <button class="sum-count__subt">-</button>
                        <div class="sum-count__count">10</div>
                        <button class="sum-count__add">+</button>
                      </div>
                    </div>
                    <div class="compos-sum">10.000 руб.</div>
                  </div>
                  <div class="compos-kid__buttons">
                    <button class="compos-kid__change">
                      <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M18.5 2.49998C18.8978 2.10216 19.4374 1.87866 20 1.87866C20.5626 1.87866 21.1022 2.10216 21.5 2.49998C21.8978 2.89781 22.1213 3.43737 22.1213 3.99998C22.1213 4.56259 21.8978 5.10216 21.5 5.49998L12 15L8 16L9 12L18.5 2.49998Z"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>
                    <button class="compos-kid__remove">
                      <svg
                        width="27"
                        height="27"
                        viewBox="0 0 27 27"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M6.75 21.375C6.75 22.6125 7.7625 23.625 9 23.625H18C19.2375 23.625 20.25 22.6125 20.25 21.375V7.875H6.75V21.375ZM9 10.125H18V21.375H9V10.125ZM17.4375 4.5L16.3125 3.375H10.6875L9.5625 4.5H5.625V6.75H21.375V4.5H17.4375Z"
                          fill="white"
                        />
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="compos-kid__item">
                  <li class="compos-kid__list-item">
                    6.Тыквенный мусс на кокосовом молоке с копчёной уткой
                  </li>
                  <div class="compos__box">
                    <div class="sum-count">
                      <div class="sum-count__counter">
                        <button class="sum-count__subt">-</button>
                        <div class="sum-count__count">10</div>
                        <button class="sum-count__add">+</button>
                      </div>
                    </div>
                    <div class="compos-sum">10.000 руб.</div>
                  </div>
                  <div class="compos-kid__buttons">
                    <button class="compos-kid__change">
                      <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M18.5 2.49998C18.8978 2.10216 19.4374 1.87866 20 1.87866C20.5626 1.87866 21.1022 2.10216 21.5 2.49998C21.8978 2.89781 22.1213 3.43737 22.1213 3.99998C22.1213 4.56259 21.8978 5.10216 21.5 5.49998L12 15L8 16L9 12L18.5 2.49998Z"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>
                    <button class="compos-kid__remove">
                      <svg
                        width="27"
                        height="27"
                        viewBox="0 0 27 27"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M6.75 21.375C6.75 22.6125 7.7625 23.625 9 23.625H18C19.2375 23.625 20.25 22.6125 20.25 21.375V7.875H6.75V21.375ZM9 10.125H18V21.375H9V10.125ZM17.4375 4.5L16.3125 3.375H10.6875L9.5625 4.5H5.625V6.75H21.375V4.5H17.4375Z"
                          fill="white"
                        />
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="compos-kid__item">
                  <li class="compos-kid__list-item">
                    7.Сырное плато (дорблю, пармезан, чедер, камамбер) с
                    фруктами, сыровялеными деликатесами, ягодами и медом — 250
                    гр.
                  </li>
                  <div class="compos__box">
                    <div class="sum-count">
                      <div class="sum-count__counter">
                        <button class="sum-count__subt">-</button>
                        <div class="sum-count__count">10</div>
                        <button class="sum-count__add">+</button>
                      </div>
                    </div>
                    <div class="compos-sum">10.000 руб.</div>
                  </div>
                  <div class="compos-kid__buttons">
                    <button class="compos-kid__change">
                      <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M18.5 2.49998C18.8978 2.10216 19.4374 1.87866 20 1.87866C20.5626 1.87866 21.1022 2.10216 21.5 2.49998C21.8978 2.89781 22.1213 3.43737 22.1213 3.99998C22.1213 4.56259 21.8978 5.10216 21.5 5.49998L12 15L8 16L9 12L18.5 2.49998Z"
                          stroke="white"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>
                    <button class="compos-kid__remove">
                      <svg
                        width="27"
                        height="27"
                        viewBox="0 0 27 27"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M6.75 21.375C6.75 22.6125 7.7625 23.625 9 23.625H18C19.2375 23.625 20.25 22.6125 20.25 21.375V7.875H6.75V21.375ZM9 10.125H18V21.375H9V10.125ZM17.4375 4.5L16.3125 3.375H10.6875L9.5625 4.5H5.625V6.75H21.375V4.5H17.4375Z"
                          fill="white"
                        />
                      </svg>
                    </button>
                  </div>
                </div-->
              </ul>
              @endif
            </div>
            @endforeach
          @endif
        </div>
      </div>
    </section>
    <section class="total">
      <div class="container">
        <div class="leftBlock">
          <div class="title">Обратите внимание:</div>
          Минимальная сумма заказа должна составлять не менее
          <span>10,000</span> руб.
        </div>
        <div class="rightBlock" data-price="2"></div>
      </div>
    </section>
    <section class="data">
        <form action="{{route('order.create')}}" method="post" data-order-form>
            @csrf
            <div class="container">
                <div class="data__wrap">
                    <div class="leftBlock">
                        <div class="title">Данные</div>
                        <div class="input-group @error('client_name') has-error @enderror">
                            <input type="hidden" value="{{auth()->id()}}" name="user_id" />
                            <input type="text" value="{{old('client_name',auth()->user()?->fio)}}" name="client_name" />
                            <label for="">Ваше имя<span>*</span></label>
                            @error('client_name')
                            <span class="error-text">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-group @error('client_phone') has-error @enderror">
                            <input type="text" name="client_phone" value="{{old('client_phone',auth()->user()?->phone)}}" />
                            <label for="">Телефон<span>*</span></label>
                            @error('client_phone')
                            <span class="error-text">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="rightBlock">
                        <div class="title">Информация о мероприятии</div>
                        <div class="inputs">
                            <div class="input-group @error('event_date') has-error @enderror">
                                <input type="date" name="event_date" value="{{old('event_date')}}"/>
                                <label for="">Дата<span>*</span></label>
                                @error('event_date')
                                <span class="error-text">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="input-group @error('guest_count') has-error @enderror">
                                <input type="number" min="1" name="guest_count" />
                                <label for="">Кол-во гостей</label>
                                @error('guest_count')
                                <span class="error-text">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="data-select__wr">
                                <div class="data-select">
                                    <div class="label">Повод</div>
                                    <div class="arrow">
                                        <svg
                                            width="11"
                                            height="9"
                                            viewBox="0 0 11 9"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M5.5 9L10.2631 0.75H0.73686L5.5 9Z"
                                                fill="#C8A98D"
                                            />
                                        </svg>
                                    </div>
                                    <div class="top">Свадьба</div>
                                    <div class="bottom">
                                        <div class="data-select__item">Свадьба</div>
                                        <div class="data-select__item">День рождения</div>
                                        <div class="data-select__item">Детский праздник</div>
                                        <div class="data-select__item">Банкет</div>
                                        <div class="data-select__item">Гала-ужин</div>
                                    </div>
                                    <input type="hidden" name="reason" class="data-select__input" value="{{old('reason','Свадьба')}}">
                                </div>
                            </div>
                            <div class="data-select__wr-format">
                                <div class="data-select">
                                    <div class="label">Формат</div>
                                    <div class="arrow">
                                        <svg
                                            width="11"
                                            height="9"
                                            viewBox="0 0 11 9"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M5.5 9L10.2631 0.75H0.73686L5.5 9Z"
                                                fill="#C8A98D"
                                            />
                                        </svg>
                                    </div>
                                    <div class="top">Свадьба</div>
                                    <div class="bottom">
                                        <div class="data-select__item">Свадьба</div>
                                        <div class="data-select__item">День рождения</div>
                                        <div class="data-select__item">Детский праздник</div>
                                        <div class="data-select__item">Банкет</div>
                                        <div class="data-select__item">Гала-ужин</div>
                                    </div>
                                    <input type="hidden" name="format" class="data-select__input" value="{{old('format','Свадьба')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="delivery__wrap">
                    <div class="leftBlock">
                        <div class="title">Доставка</div>
                        <div class="input-group city @error('city') has-error @enderror">
                            <input type="text" name="city"  value="{{old('city')}}"/>
                            <label for="">Город<span>*</span></label>
                            @error('city')
                            <span class="error-text">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="radio">
                            <div class="radio-group">
                                <input type="radio" name="user_city" id="rostov" checked value="rostov" />
                                <label for="rostov">Ростов-на-Дону</label>
                            </div>
                            <div class="radio-group">
                                <input type="radio" name="user_city" id="other" checked value="other" />
                                <label for="other">Другой</label>
                            </div>
                        </div>
                        <div class="home">
                            <div class="input-group street @error('street') has-error @enderror">
                                <input type="text" name="street" value="{{old('street')}}"/>
                                <label for="">Улица<span>*</span></label>
                                @error('street')
                                <span class="error-text">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="input-group house @error('building') has-error @enderror">
                                <input type="text" name="building" value="{{old('building')}}"/>
                                <label for="">Дом<span>*</span></label>
                                @error('building')
                                <span class="error-text">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="rightBlock">
                        <div class="title">Способ оплаты</div>
                        <div class="payment-check">
                            <div class="radio-group">
                                <input type="radio" name="payment_type" checked value="card" id="cart" />
                                <label for="cart">Карта</label>
                            </div>
                            <div class="radio-group">
                                <input type="radio" name="payment_type" value="transfer" id="transfer" />
                                <label for="transfer">Перевод на расчетный счет</label>
                            </div>
                        </div>
                        <div class="payment">
                            <div class="left">
                                <a href="#" class="link__wrap" data-order-create>
                                    <div class="link--arrow-black">Оплатить</div>
                                </a>
                            </div>
                            <div class="right">
                                <div class="policy">
                                    Нажимая кнопку «Отправить заказ», Вы соглашаетесь с
                                    условиями
                                    <a href="{{url('agreement')}}">Пользовательского соглашения</a> и
                                    <a href="{{url('politics')}}"> Политики конфиденциальности. </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
  </main>
@endsection
