@extends('layouts.home')

@section('header', 'header-white')

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/mainpage/styles.css">
@endsection
@section('scripts')
    @include('include.addbasket')
    <script src="/js/quiz/app.js"></script>
    <script>
        let adultInput = document.querySelector("#adults_count");
        let childInput = document.querySelector("#child_count");
        adultInput.addEventListener("input", function () {
            adultInput.value = adultInput.value.replace(/[^0-9]/g, "");
        });
        childInput.addEventListener("input", function () {
            childInput.value = childInput.value.replace(/[^0-9]/g, "");
        });
    </script>
@endsection
@section('modal')
    @include('include.modal1')
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

@section('content')
    <main>
        <section class="premium">
            <div class="container">
                <h1 class="premium__title">{{$page->h1}}</h1>
                <p class="premium__text">
                    {{$page->subtitle}}
                </p>
                <div class="premium__item">
                    <a class="premium__link link--arrow-white">
                        Заказать мероприятие
                    </a>
                </div>
            </div>
        </section>
        <section class="info">
            <div class="container relative">
                <div class="swiper-container info__wp">
                    <div class="swiper-wrapper">
                      @foreach($sliders as $slidel)
                        <?php /*Выборка URL адреса*/
                          $item3 = $slidel;
                          $imageresor3='';
                          $imagalt3='';
                          $image3 = $item3->attachment()->first();
                          if ($image3!=null):
                            $imageresor3=$image3['url'];
                            $imagalt3=$image3['alt'];
                          endif;
                        ?>
                        <?php if(($slidel->active)!='0'):?>
                          <div class="swiper-slide">
                            <div class="info__inner">
                                <div class="info__content">
                                    <div class="info__title">{{$slidel['title']}}</div>
                                    <div class="info__text">
                                      <?php $descinhtm = html_entity_decode($slidel['desc']);
                                        echo $descinhtm;
                                      ?>
                                    </div>
                                    <div class="info__date">{{$slidel['datepub']}}</div>
                                </div>
                                <div class="info__image">
                                    <img class="info__img" src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                            </div>
                          </div>
                        <?php endif;?>
                      @endforeach
                    </div>
                </div>
                <div class="swiper-button-prev info__prev">
                    <svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.469669 6.53033C0.176777 6.23744 0.176777 5.76257 0.469669 5.46967L5.24264 0.696701C5.53553 0.403808 6.01041 0.403808 6.3033 0.696701C6.59619 0.989595 6.59619 1.46447 6.3033 1.75736L2.06066 6L6.3033 10.2426C6.59619 10.5355 6.59619 11.0104 6.3033 11.3033C6.01041 11.5962 5.53553 11.5962 5.24264 11.3033L0.469669 6.53033ZM29 6.75L1 6.75L1 5.25L29 5.25L29 6.75Z"
                            fill="#C8A98D" />
                    </svg>
                </div>
                <div class="swiper-button-next info__next">
                    <svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M28.5303 6.53033C28.8232 6.23744 28.8232 5.76257 28.5303 5.46967L23.7574 0.696701C23.4645 0.403808 22.9896 0.403808 22.6967 0.696701C22.4038 0.989595 22.4038 1.46447 22.6967 1.75736L26.9393 6L22.6967 10.2426C22.4038 10.5355 22.4038 11.0104 22.6967 11.3033C22.9896 11.5962 23.4645 11.5962 23.7574 11.3033L28.5303 6.53033ZM-6.55671e-08 6.75L28 6.75L28 5.25L6.55671e-08 5.25L-6.55671e-08 6.75Z"
                            fill="#C8A98D" />
                    </svg>
                </div>
            </div>
        </section>
        <section class="about">
          <div class="container">
            <div class="about__item">
              <div class="about__item-title">{{$page->doptitle1}}</div>
              <div class="about__item-text">
                <?php $descinhtm = html_entity_decode($page->doptxt1); echo $descinhtm;?>
              </div>
            </div>
            <div class="about__image">
                @php /*Выборка URL адреса*/
                    $osnimage='';
                    $imageres='';
                    $imagesalt='';
                    if($page->attachment()->first()!=null){
                        $osnimage = $page->attachment()->first();
                        $imageres=$osnimage['url'];
                        $imagesalt=$osnimage['alt'];
                    }
                @endphp
                @if($osnimage!='')
                    <img src="{{$imageres}}" alt="{{$imagesalt}}" />
                @else
                    <img src="/assets/img/about-image.jpg" alt="{{$page->title}}" />
                @endif
            </div>
            <div class="about__item">
              <div class="about__item-title">{{$page->doptitle2}}</div>
              <div class="about__item-text">
                    <?php $descinhtm = html_entity_decode($page->doptxt2); echo $descinhtm;?>
              </div>
            </div>
          </div>
        </section>
        <!-- QUIZ -->
        <div id="quizelem"></div>
        <!-- QUIZ -->

        <section class="ready">
            <div class="container container--relative">
                <h2 class="ready__title">Готовые решения</h2>
                <div class="swiper-container ready__wp">
                    <div class="swiper-wrapper">
                        <?php $fl=false?>
                        @foreach($prodgotresh as $prodgotreshel)
                            <?php /*Выборка URL адреса*/
                                $item2 = $prodgotreshel;
                                $imageresor='';
                                $imagalt='';
                                $image = $item2->attachment()->first();
                                if ($image!=null):
                                    $imageresor=$image['url'];
                                    $imagalt=$image['alt'];
                                endif;
                                $pathcat='';
                                $namecat='';
                            ?>
                            @foreach($prodgotreshel->cataloggrel as $categoryelem)
                                <?php $pathcat=$categoryelem->url; $namecat=$categoryelem->name; break;?>
                            @endforeach

                            <div class="swiper-slide <?php if ($fl==false):?>swiper-slide--flex<?php endif;?>">
                            <div class="ready__item">
                                <a href="{{ '/menu/'.$pathcat.'/'.$prodgotreshel->url }}">
                                <div class="ready__image <?php if ($fl==false):?>ready__image--minsize<?php else:?>ready__image--bigsize<?php endif;?>">
                                
                                    <img
                                    class="ready__img"
                                    src="{{$imageresor}}"
                                    alt="{{$imagalt}}"
                                    />
                                
                                </div>
                                </a>
                                <div class="ready-category">
                                <div class="ready-category__items">
                                    @if($prodgotreshel->tooltip1)
                                        <div class="ready-category__item">
                                            <div class="ready-category__item-image">
                                                <img class="tooltip__item-img"  src="/assets/img/fossil3.svg" alt=""/>
                                            </div>
                                            <div class="ready-category__item-tooltip">
                                                {{ __('product.tooltip_1') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if($prodgotreshel->tooltip2)
                                        <div class="ready-category__item">
                                            <div class="ready-category__item-image">
                                                <img class="tooltip__item-img" src="/assets/img/veganbig.svg" alt=""/>
                                            </div>
                                            <div class="ready-category__item-tooltip">
                                                {{ __('product.tooltip_2') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if($prodgotreshel->tooltip3)
                                        <div class="ready-category__item">
                                            <div class="ready-category__item-image">
                                                <img class="tooltip__item-img" src="/assets/img/vegetarian1.svg" alt=""/>
                                            </div>
                                            <div class="ready-category__item-tooltip">
                                                {{ __('product.tooltip_3') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if($prodgotreshel->tooltip4)
                                        <div class="ready-category__item">
                                            <div class="ready-category__item-image">
                                                <img class="tooltip__item-img" src="/assets/img/glutenfree1.svg" alt=""/>
                                            </div>
                                            <div class="ready-category__item-tooltip">
                                                {{ __('product.tooltip_4') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <a class="tag" href="{{ '/menu/'.$pathcat }}">{{$namecat}}</a>
                                </div>
                                <div class="ready__person">@if(($prodgotreshel->naborot)!=null) Набор на {{$prodgotreshel->naborot}} человек @else {{$prodgotreshel->name}} @endif</div>
                                <div class="ready__total">
                                <div class="ready__total-price">{{$prodgotreshel->price_full}} руб.</div>
                                <div class="ready__total-weight">{{$prodgotreshel->weight_full}} г. </div>
                                </div>
                                <div class="ready__buttons">
                                <button class="ready__buttons-basket inCartKor js-add-cart" data-id="{{$prodgotreshel->id}}" data-pr="productgr">в корзину</button>
                                <a class="inCartOne ready__buttons-link link--arrow-brown" data-id="{{$prodgotreshel->id}}" data-pr="productgr" data-href="{{URL::to('/basket')}}">В 1 клик</a>
                                </div>
                            </div>
                            </div>
                            
                            <?php if ($fl):$fl=false;else:$fl=true;endif;?>
                        @endforeach

                    </div>
                    <!--div class="swiper-pagination ready__pagination default"></div-->
                </div>
                <div class="swiper-button-prev ready__button-prev">
                    <svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.469669 6.53033C0.176777 6.23744 0.176777 5.76257 0.469669 5.46967L5.24264 0.696701C5.53553 0.403808 6.01041 0.403808 6.3033 0.696701C6.59619 0.989595 6.59619 1.46447 6.3033 1.75736L2.06066 6L6.3033 10.2426C6.59619 10.5355 6.59619 11.0104 6.3033 11.3033C6.01041 11.5962 5.53553 11.5962 5.24264 11.3033L0.469669 6.53033ZM29 6.75L1 6.75L1 5.25L29 5.25L29 6.75Z"
                            fill="#C8A98D" />
                    </svg>
                </div>
                <div class="swiper-button-next ready__button-next">
                    <svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M28.5303 6.53033C28.8232 6.23744 28.8232 5.76257 28.5303 5.46967L23.7574 0.696701C23.4645 0.403808 22.9896 0.403808 22.6967 0.696701C22.4038 0.989595 22.4038 1.46447 22.6967 1.75736L26.9393 6L22.6967 10.2426C22.4038 10.5355 22.4038 11.0104 22.6967 11.3033C22.9896 11.5962 23.4645 11.5962 23.7574 11.3033L28.5303 6.53033ZM-6.55671e-08 6.75L28 6.75L28 5.25L6.55671e-08 5.25L-6.55671e-08 6.75Z"
                            fill="#C8A98D" />
                    </svg>
                </div>
            </div>
        </section>
        <section class="events">
            <div class="container">
                <h2 class="events__title">Проведенные мероприятия</h2>
                <!-- мобильном устройстве  -->
                <div class="swiper-container events__wp">
                    
                    <div class="swiper-wrapper">
                        <?php $fl=1?>
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
                            <?php if(($portfolioel->oncenterslider)!='0'):?>
                                <div class="swiper-slide">
                                    <div class="events__item">
                                        <div class="events__image">
                                            <img class="events__img" src="{{$imageresor}}" alt="{{$imagalt}}" />
                                        </div>
                                        <div class="events__date">{{$item2['dataprov']}}</div>
                                        <div class="events__link">
                                            <a class="events__link-item link--arrow-brown"
                                                href="{{ '/portfolio/'.$pathcat.'/'.$portfolioel->url }}">{{$item2['name']}}</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endif;?>
                        <?php $fl++;
                        if ($fl>6){break;};?>
                        @endforeach
                    </div>
                    <!--div class="swiper-pagination events__pagination default"></div-->
                </div>
                <!-- десктопная версия  -->
                <div class="events__items">
                  <?php $fl=1?>
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
                    <?php if(($portfolioel->oncenterslider)!='0'):?>
                      <?php if(($fl==1)||($fl==6)):?>
                        <div class="events__item">
                          <div class="events__image events__image--bgz">
                              <img class="events__img" src="{{$imageresor}}" alt="{{$imagalt}}" />
                          </div>
                          <div class="events__date">{{$item2['dataprov']}}</div>
                          <div class="events__link">
                              <a class="events__link-item link--arrow-brown" href="{{ '/portfolio/'.$pathcat.'/'.$portfolioel->url }}">{{$item2['name']}}</a>
                          </div>
                        </div>
                      <?php else:?>
                        <div class="events__item events__item-mini">
                          <div class="events__image events__image--min">
                              <img class="events__img" src="{{$imageresor}}" alt="{{$imagalt}}" />
                          </div>
                          <div class="events__date">{{$item2['dataprov']}}</div>
                          <div class="events__link">
                              <a class="events__link-item link--arrow-brown" href="{{ '/portfolio/'.$pathcat.'/'.$portfolioel->url }}">{{$item2['name']}}</a>
                          </div>
                        </div>
                      <?php endif;?>
                    <?php endif;?>
                    <?php endif;?>
                    <?php $fl++;
                    if ($fl>6){break;};?>
                  @endforeach
                </div>
                <div class="events__next">
                    <a href="portfolio" class="events__next-link link--arrow-brown">Смотреть ещё</a>
                </div>
            </div>
        </section>

        <section class="weyouteb">
            <div class="container">
                <h2 class="weyouteb__title">Мы в Youtube</h2>
                <div class="weyouteb__items">
                  <?php $fl=1?>
                  @foreach($linkvideos as $linkvideo)
                    <?php if(($linkvideo->active)!='0'):
                      $fltext="<iframe width='100%' height='100%' src='https://www.youtube.com/embed/".$linkvideo['link']."' title='".$linkvideo['title']."' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                      ?>
                      <?php if($fl==1):?>
                        <div class="weyouteb__video-big">
                          <div class="weyouteb__item weyouteb__item--bz">
                              <?php echo $fltext?>
                          </div>
                        </div>
                        <div class="weyouteb__video-small">
                      <?php else:?> 
                        <div class="weyouteb__item weyouteb__item-sz">
                          <?php echo $fltext?>
                        </div>
                      <?php endif;?>
                    <?php endif; $fl++;
                    if($fl>=6){break;}?>
                  @endforeach
                  <?php if($fl>=2):?>
                    </div>
                  <?php endif;?>
                </div>
            </div>
        </section>

        <!-- Форма обратной связи -->
        @include('include.form')
    </main>
@endsection


