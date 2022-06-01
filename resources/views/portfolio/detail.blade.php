@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
    <link rel="stylesheet" href="/css/portfolio/detail/styles.css">
@endsection

@section('title')
    <title>{{$page['title']}}</title>
@endsection
@section('description')
    <meta name="description" content="{{strip_tags($page['description'])}}">
@endsection
@section('keywords')
    <meta name="keywords" content="{{$page['keywords']}}">
@endsection

@section('content')
<main class="padding">
    <section class="portfolioDetail">
      <div class="container">
        @include('include.bread')
        <h1>{{$page['h1']}}</h1>
        <div class="item">
          <div class="item__wr">
            <div class="leftBlock">
              <div class="title">
                <?php $descinhtm = html_entity_decode($portfolio['doptxt']);
                    echo $descinhtm;?>
                </div>
              <div class="char">
                <div class="char__item">
                  <div class="left">Количество персон</div>
                  <div class="right">{{$portfolio['kolperson']}}</div>
                </div>
                <div class="char__item">
                  <div class="left">Место проведения</div>
                  <div class="right">{{$portfolio['mestoprov']}}</div>
                </div>
                <div class="char__item">
                  <div class="left">Дата проведения</div>
                  <div class="right">{{$portfolio['dataprov']}}</div>
                </div>
                <div class="char__item">
                  <div class="left">Формат проведения</div>
                  <div class="right">{{$portfolio['formatprov']}}</div>
                </div>
              </div>
              <?php /*Выборка URL адреса*/
                $item = $portfolio;
                $imageres='';
                $imagesalt='';
                $linkvideo='';
                $image2 = $item->attachment()->get();
                if ($image2!=null){
                  if (isset($image2[0])){
                    $imageres=$image2[0]['url'];
                    $imagesalt=$image2[0]['alt'];
                  };
                };
              ?>
              <a href="javascript:void(0);" class="order premium__link"> Заказать праздник </a>
              <div class="swiper gallery">
                <div class="swiper-wrapper">
                  @foreach($image2 as $imageel)
                      <?php 
                          $imageresor='';
                          $imagalt='';
                          if ($imageel!=null):
                              $imageresor=$imageel['url'];
                              $imagalt=$imageel['alt'];
                          endif;
                      ?>
                      <div class="swiper-slide">
                        <div
                          class="gallery__item"
                          href="{{$imageresor}}"
                          data-fancybox="gallery">
                          <img src="{{$imageresor}}" alt="{{$imagalt}}" />
                        </div>
                      </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="rightBlock">
              <img src="{{$imageres}}" alt="{{$imagesalt}}" />
            </div>
          </div>
          <?php if ($item['linkvideo']!=null):
            $fltext="<iframe width='100%' height='100%' src='https://www.youtube.com/embed/".$item['linkvideo']."' title='".$item['name']."' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
            ?>
            <div class="video">
              <?php echo $fltext?>
            </div>
          <?php endif;?>
        </div>
      </div>
    </section>
    <section class="other-slider">
      <div class="container">
        <h2>Другие мероприятия</h2>
        <div class="swiper-container other__wp">
          <div class="swiper-wrapper">
            <?php $fl=false?>
            @foreach($portfolios as $portfolioel)
              <?php /*Выборка URL адреса*/
                $item2 = $portfolioel;
                $imageresor='';
                $imagalt='';
                $image = $item2->attachment()->first();
                if ($image!=null):
                  $imageresor=$image['url'];
                  $imagalt=$image['alt'];
                endif;
                $pathcat='';
              ?>
              @foreach($portfolioel->categoryelportf as $categoryelportflem)
                <?php $pathcat=$categoryelportflem->url; break;?>
              @endforeach

              <?php if(($portfolioel->active)!='0'):?>
              <div class="swiper-slide <?php if ($fl==false):?>swiper-slide--flex<?php endif;?>">
                <div class="ready__item">
                  <a href="{{ '/portfolio/'.$pathcat.'/'.$portfolioel->url }}">
                    <div class="ready__image <?php if ($fl==false):?>ready__image--minsize<?php else:?>ready__image--bigsize<?php endif;?>">
                        <img
                          class="ready__img"
                          src="{{$imageresor}}"
                          alt="{{$imagalt}}"
                        />
                    </div>
                  </a>
                  <div class="title">{{$item2['name']}}</div>
                  <a href="{{ '/portfolio/'.$pathcat.'/'.$portfolioel->url }}" class="link">Смотреть</a>
                </div>
              </div>
              <?php endif;?>
              <?php if ($fl):$fl=false;else:$fl=true;endif;?>
            @endforeach
          </div>
        </div>
        <div class="swiper-pagination other__pagination default"></div>
        <div class="other__button-prev">
          <svg
            width="29"
            height="12"
            viewBox="0 0 29 12"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M0.469669 6.53033C0.176777 6.23744 0.176777 5.76257 0.469669 5.46967L5.24264 0.696701C5.53553 0.403808 6.01041 0.403808 6.3033 0.696701C6.59619 0.989595 6.59619 1.46447 6.3033 1.75736L2.06066 6L6.3033 10.2426C6.59619 10.5355 6.59619 11.0104 6.3033 11.3033C6.01041 11.5962 5.53553 11.5962 5.24264 11.3033L0.469669 6.53033ZM29 6.75L1 6.75L1 5.25L29 5.25L29 6.75Z"
              fill="#C8A98D"
            />
          </svg>
        </div>
        <div class="other__button-next">
          <svg
            width="29"
            height="12"
            viewBox="0 0 29 12"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M28.5303 6.53033C28.8232 6.23744 28.8232 5.76257 28.5303 5.46967L23.7574 0.696701C23.4645 0.403808 22.9896 0.403808 22.6967 0.696701C22.4038 0.989595 22.4038 1.46447 22.6967 1.75736L26.9393 6L22.6967 10.2426C22.4038 10.5355 22.4038 11.0104 22.6967 11.3033C22.9896 11.5962 23.4645 11.5962 23.7574 11.3033L28.5303 6.53033ZM-6.55671e-08 6.75L28 6.75L28 5.25L6.55671e-08 5.25L-6.55671e-08 6.75Z"
              fill="#C8A98D"
            />
          </svg>
        </div>
      </div>
    </section>
  </main>
@endsection

@section('modal')
    @include('include.modal2portfdet')
@endsection