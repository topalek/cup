@extends('layouts.home')

@section('header', 'header-white')

@section('styles')
    <link rel="stylesheet" href="/css/wedding/styles.css">
@endsection
@section('scripts')
@endsection


@section('content')
<main>
  <section class="hero">
    <div class="container">
      <h1 class="hero__title">{{$title}}</h1>
      <p class="hero__text">
        <?php $descinhtm = strip_tags($desc);
          echo $descinhtm;
        ?>
      </p>
      <div class="hero__item">
        <a class="hero__link link--arrow-white" href="#">Заказать мероприятие</a>
      </div>
    </div>
  </section>
  <section class="style">
    <div class="container">
      <div class="style__items">
        <?php $fl=1?>
        @foreach($formats as $format)
          <?php /*Выборка URL адреса*/
            $item3 = $format;
            $imageresor3='';
            $imagalt3='';
            $image3 = $item3->attachment()->first();
            if ($image3!=null):
              $imageresor3=$image3['url'];
              $imagalt3=$image3['alt'];
            endif;
            $pathcat='';
          ?>
          @foreach($format->catformatel as $catformatelem)
            <?php $pathcat=$catformatelem->url; break;?>
          @endforeach
          @if(($format->active)!='0')
            @if($fl==1)
              <div class="style__item">
                <div class="style__item-image">
                  <img
                    src="{{$imageresor3}}"
                    class="style__item-img"
                    alt="{{$imagalt3}}"
                  />
                </div>
                <div class="style__item-content">
                  <div class="style__item-title">{{$format->title}}</div>
                  <div class="style__item-text">
                        <?php $descinhtm = strip_tags($format->shortdesc);
                          echo $descinhtm;
                        ?>
                  </div>
                  <a href="{{ '/format/'.$pathcat.'/'.$format->url }}" class="style__item-link link--arrow-brown" >Подробнее</a>
                </div>
              </div>
            @endif
            @if($fl==2)
              <div class="style__item style__item--width">
                <div class="style__item-image">
                  <img
                    src="{{$imageresor3}}"
                    class="style__item-img"
                    alt="{{$imagalt3}}"
                  />
                </div>
                <div class="style__item-content">
                  <div class="style__item-title">{{$format->title}}</div>
                  <div class="style__item-text">
                    <?php $descinhtm = strip_tags($format->shortdesc);
                      echo $descinhtm;
                    ?>
                  </div>
                  <a href="{{ '/format/'.$pathcat.'/'.$format->url }}" class="style__item-link link--arrow-brown"
                    >Подробнее</a
                  >
                </div>
              </div>
            @endif
            @if($fl==3)
              <div class="style__item style__item--reverse style__item--width">
                <div class="style__item-image">
                  <img
                    src="{{$imageresor3}}"
                    class="style__item-img"
                    alt="{{$imagalt3}}"
                  />
                </div>
                <div class="style__item-content">
                  <div class="style__item-title">{{$format->title}}</div>
                  <div class="style__item-text">
                    <?php $descinhtm = strip_tags($format->shortdesc);
                      echo $descinhtm;
                    ?>
                  </div>
                  <a href="{{ '/format/'.$pathcat.'/'.$format->url }}" class="style__item-link link--arrow-brown"
                    >Подробнее</a
                  >
                </div>
              </div>
            @endif
            @if($fl==4)
              <div class="style__item style__item--reverse">
                <div class="style__item-image">
                  <img
                    src="{{$imageresor3}}"
                    class="style__item-img"
                    alt="{{$imagalt3}}"
                  />
                </div>
                <div class="style__item-content">
                  <div class="style__item-title">{{$format->title}}</div>
                  <div class="style__item-text">
                    <?php $descinhtm = strip_tags($format->shortdesc);
                      echo $descinhtm;
                    ?>
                  </div>
                  <a href="{{ '/format/'.$pathcat.'/'.$format->url }}" class="style__item-link link--arrow-brown"
                    >Подробнее</a
                  >
                </div>
              </div>
            @endif
            @if($fl==5)
              <div class="style__item style__item--widthall style__item--reverse">
                <div class="style__item-image style__item-image--big">
                  <img
                    src="{{$imageresor3}}"
                    class="style__item-img"
                    alt="{{$imagalt3}}"
                  />
                </div>
                <div class="style__item-content">
                  <div class="style__item-title">{{$format->title}}</div>
                  <div class="style__item-text">
                    <?php $descinhtm = strip_tags($format->shortdesc);
                      echo $descinhtm;
                    ?>
                  </div>
                  <a href="{{ '/format/'.$pathcat.'/'.$format->url }}" class="style__item-link link--arrow-brown">Подробнее</a>
                </div>
              </div>
            @endif
            <?php $fl++; if($fl==6){$fl=1;};?>
          @endif
        @endforeach
      </div>
    </div>
  </section>
  <section class="events">
    <div class="container">
      <h2 class="events__title">Проведенные мероприятия</h2>
      <!-- мобильном устройстве  -->
      <div class="swiper-container events__wp">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="events__item">
              <div class="events__image">
                <img
                  class="events__img"
                  src="/assets/img/eventsimg.png"
                  alt=""
                />
              </div>
              <div class="events__date">2020</div>
              <div class="events__link">
                <a class="events__link-item link--arrow-brown" href="#"
                  >выездной свадебгный кейтеринг</a
                >
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="events__item">
              <div class="events__image">
                <img
                  class="events__img"
                  src="/assets/img/eventsimg.png"
                  alt=""
                />
              </div>
              <div class="events__date">2020</div>
              <div class="events__link">
                <a class="events__link-item link--arrow-brown" href="#"
                  >выездной свадебгный кейтеринг</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination events__pagination default"></div>
      </div>
      <!-- десктопная версия  -->
      <div class="events__items">
        <div class="events__item">
          <div class="events__image events__image--bgz">
            <img
              class="events__img"
              src="/assets/img/eventsimg.png"
              alt=""
            />
          </div>
          <div class="events__date">2020</div>
          <div class="events__link">
            <a class="events__link-item link--arrow-brown" href="#"
              >выездной свадебгный кейтеринг</a
            >
          </div>
        </div>
        <div class="events__item events__item-mini">
          <div class="events__image events__image--min">
            <img
              class="events__img"
              src="/assets/img/eventsimg.png"
              alt=""
            />
          </div>
          <div class="events__date">2020</div>
          <div class="events__link">
            <a class="events__link-item link--arrow-brown" href="#"
              >выездной свадебгный кейтеринг</a
            >
          </div>
        </div>
        <div class="events__item events__item-mini">
          <div class="events__image events__image--min">
            <img
              class="events__img"
              src="/assets/img/eventsimg.png"
              alt=""
            />
          </div>
          <div class="events__date">2020</div>
          <div class="events__link">
            <a class="events__link-item link--arrow-brown" href="#"
              >выездной свадебгный кейтеринг</a
            >
          </div>
        </div>
        <div class="events__item events__item-mini">
          <div class="events__image events__image--min">
            <img
              class="events__img"
              src="/assets/img/eventsimg.png"
              alt=""
            />
          </div>
          <div class="events__date">2020</div>
          <div class="events__link">
            <a class="events__link-item link--arrow-brown" href="#"
              >выездной свадебгный кейтеринг</a
            >
          </div>
        </div>
        <div class="events__item events__item-mini">
          <div class="events__image events__image--min">
            <img
              class="events__img"
              src="/assets/img/eventsimg.png"
              alt=""
            />
          </div>
          <div class="events__date">2020</div>
          <div class="events__link">
            <a class="events__link-item link--arrow-brown" href="#"
              >выездной свадебгный кейтеринг</a
            >
          </div>
        </div>
        <div class="events__item">
          <div class="events__image events__image--bgz">
            <img
              class="events__img"
              src="/assets/img/eventsimg.png"
              alt=""
            />
          </div>
          <div class="events__date">2020</div>
          <div class="events__link">
            <a class="events__link-item link--arrow-brown" href="#"
              >выездной свадебгный кейтеринг</a
            >
          </div>
        </div>
      </div>
      <div class="events__next">
        <a class="events__next-link link--arrow-brown">Смотреть ещё</a>
      </div>
    </div>
  </section>
  <section class="feedback">
    <div class="container">
      <div class="feedback__image">
        <img
          class="feedback__image-img"
          src="/assets/img/feedbackBg.png"
          alt=""
        />
      </div>
      <form class="form-feedback">
        <div class="form-feedback__inner">
          <div class="feedback__request-title">Заказать звонок</div>
          <div class="feedback__inputs">
            <input
              class="feedback__input"
              type="text"
              placeholder="Виктор"
              maxlength="12"
            />
            <input
              class="feedback__input"
              type="text"
              placeholder="+7 (___) ___-__-__"
              maxlength="11"
            />
          </div>
          <button class="feedback__submit link--arrow-black" type="submit">
            отправить
          </button>
        </div>
      </form>
    </div>
    <div class="feedback__decor"></div>
  </section>
</main>
@endsection
