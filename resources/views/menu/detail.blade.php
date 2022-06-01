@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="/css/menu/detail/styles.css">
@endsection

@section('scripts')
  @include('include.addbasket')
@endsection

@section('content')
  <main>
    <section class="description">
      <div class="container">
        @include('include.bread')
        <br>
        <h1 class="description__title">{{ $h1 }}</h1>
          <?php /*Выборка URL адреса*/
                $imageres='';
                $imagesalt='';
                $imageres2='';
                $imagesalt2='';
                $imageres3='';
                $imagesalt3='';
                $imageres4='';
                $imagesalt4='';
                $linkvideo='';
                $image2=null;
               
                $image2 = $product->attachment()->get();

                if ($image2!=null){
                  if (isset($image2[0])){
                    $imageres=$image2[0]['url'];
                    $imagesalt=$image2[0]['alt'];
                  };
                  if (isset($image2[1])){
                    $imageres2=$image2[1]['url'];
                    $imagesalt2=$image2[1]['alt'];
                  };
                  if (isset($image2[2])){
                    $imageres3=$image2[2]['url'];
                    $imagesalt3=$image2[2]['alt'];
                  };
                  if (isset($image2[3])){
                    $imageres4=$image2[3]['url'];
                    $imagesalt4=$image2[3]['alt'];
                  };
                };
          ?>
        <div class="description__inner">
          <div class="description__item description__box">
            <!-- TODO: Слайдеры не синхронны надо чинить -->
            <div class="swiper-container description__mySwiper2">
              <div class="swiper-wrapper">

                <?php if($imageres!=''):?>
                <div class="swiper-slide swiper-slide__big">
                  <div 
                    href="{{$imageres}}"
                    data-fancybox="gallery"
                    class="description__image-big">
                    <img src="{{$imageres}}" alt="{{$imagesalt}}"/>
                  </div>
                </div>
                <?php endif;?>
                <?php if($imageres2!=''):?>
                <div class="swiper-slide swiper-slide__big">
                  <div 
                    href="{{$imageres2}}"
                    data-fancybox="gallery"
                    class="description__image-big">
                    <img src="{{$imageres2}}" alt="{{$imagesalt2}}"/>
                  </div>
                </div>
                <?php endif;?>
                <?php if($imageres3!=''):?>
                <div class="swiper-slide swiper-slide__big">
                  <div
                    href="{{$imageres3}}"
                    data-fancybox="gallery"
                    class="description__image-big">
                    <img src="{{$imageres3}}" alt="{{$imagesalt3}}"/>
                  </div>
                </div>
                <?php endif;?>
                <?php if($imageres4!=''):?>
                <div class="swiper-slide swiper-slide__big">
                  <div
                    href="{{$imageres4}}"
                    data-fancybox="gallery"
                    class="description__image-big">
                    <img src="{{$imageres4}}" alt="{{$imagesalt4}}"/>
                  </div>
                </div>
                <?php endif;?>
              </div>
            </div>
            <div thumbsSlider="" class="swiper-container description__mySwiper">
              <div class="swiper-wrapper description__wp-small">
                  <?php if($imageres!=''):?>
                    <div class="swiper-slide">
                      <div class="description__image-small">
                        <img src="{{$imageres}}" alt="{{$imagesalt}}"/>
                      </div>
                    </div>
                  <?php endif;?>
                  <?php if($imageres2!=''):?>
                    <div class="swiper-slide">
                      <div class="description__image-small">
                        <img src="{{$imageres2}}" alt="{{$imagesalt2}}"/>
                      </div>
                    </div>
                  <?php endif;?>
                  <?php if($imageres3!=''):?>
                    <div class="swiper-slide">
                      <div class="description__image-small">
                        <img src="{{$imageres3}}" alt="{{$imagesalt3}}"/>
                      </div>
                    </div>
                  <?php endif;?>
                  <?php if($imageres4!=''):?>
                    <div class="swiper-slide">
                      <div class="description__image-small">
                        <img src="{{$imageres4}}" alt="{{$imagesalt4}}"/>
                      </div>
                    </div>
                  <?php endif;?>
              </div>
            </div>
          </div>
          <div class="description__item description__info">
              <?php $descinhtm = html_entity_decode($product->description);
                echo $descinhtm;
              ?>
            <div class="composition">
              <div class="title">{{ __('product.composition') }}</div>
              <div class="text">
                <?php $descinhtm = html_entity_decode($product->composition);
                  echo $descinhtm;
                ?>
              </div>
            </div>
            <div class="tooltip__items">
              @if($product->tooltip1)
                <div class="tooltip__item">
                  <div class="tooltip__item-image">
                    <img class="tooltip__item-img"  src="/assets/img/fossil3.svg" alt=""/>
                  </div>
                  <div class="tooltip__item-tooltip">
                    {{ __('product.tooltip_1') }}
                  </div>
                </div>
              @endif

              @if($product->tooltip2)
                  <div class="tooltip__item">
                    <div class="tooltip__item-image">
                      <img class="tooltip__item-img" src="/assets/img/veganbig.svg" alt=""/>
                    </div>
                    <div class="tooltip__item-tooltip">
                      {{ __('product.tooltip_2') }}
                    </div>
                  </div>
              @endif

              @if($product->tooltip3)
                  <div class="tooltip__item">
                    <div class="tooltip__item-image">
                      <img class="tooltip__item-img" src="/assets/img/vegetarian1.svg" alt=""/>
                    </div>
                    <div class="tooltip__item-tooltip">
                      {{ __('product.tooltip_3') }}
                    </div>
                  </div>
              @endif

              @if($product->tooltip4)
                  <div class="tooltip__item">
                    <div class="tooltip__item-image">
                      <img class="tooltip__item-img" src="/assets/img/glutenfree1.svg" alt=""/>
                    </div>
                    <div class="tooltip__item-tooltip">
                      {{ __('product.tooltip_4') }}
                    </div>
                  </div>
              @endif
            </div>
            <div class="description__price">{{ $product->price_full }} {{ __('product.ruble_letter') }}</div>
            <div class="description__other">
              <button class="description__other-btn inCartKor js-add-cart" data-id="{{$product->id}}" data-pr="product">{{ __('product.to_cart') }}</button>
              <a class="description__other-link link--arrow-brown inCartOne" data-id="{{$product->id}}" data-pr="product" data-href="{{URL::to('/basket')}}">{{ __('product.by_one_click') }}</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ready try">
      <!-- TODO: Не знаю как это будет выставлять для каждого товара или нет, поэтому реализация не ясна -->
      <!-- TODO: Можно сделать унифицированный метод и далее просто у товара заполнять какие из массива выбрать  -->
      <div class="container container--relative">
        <h2 class="ready__title">Попробуйте так же</h2>
        <div class="swiper-container ready__wp">
          <div class="swiper-wrapper">
              <?php $fl=false?>
              @foreach($prodpoprob as $productspopel)
                <?php if($productspopel['id']!=$product['id']):?>
                  <?php /*Выборка URL адреса*/
                    $item2 = $productspopel;
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
                  @foreach($productspopel->categoryel as $categoryelem)
                    <?php $pathcat=$categoryelem->url; $namecat=$categoryelem->name; break;?>
                  @endforeach
                  <?php if(($productspopel->active)!='0'):?>
                    <div class="swiper-slide <?php if ($fl==false):?>swiper-slide--flex<?php endif;?>">
                      <div class="ready__item">
                        <a href="{{ '/menu/'.$pathcat.'/'.$productspopel->url }}">
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
                              @if($productspopel->tooltip1)
                                <div class="ready-category__item">
                                    <div class="ready-category__item-image">
                                        <img class="tooltip__item-img"  src="/assets/img/fossil3.svg" alt=""/>
                                    </div>
                                    <div class="ready-category__item-tooltip">
                                        {{ __('product.tooltip_1') }}
                                    </div>
                                </div>
                              @endif
                              @if($productspopel->tooltip2)
                                <div class="ready-category__item">
                                    <div class="ready-category__item-image">
                                        <img class="tooltip__item-img" src="/assets/img/veganbig.svg" alt=""/>
                                    </div>
                                    <div class="ready-category__item-tooltip">
                                        {{ __('product.tooltip_2') }}
                                    </div>
                                </div>
                              @endif
                              @if($productspopel->tooltip3)
                                <div class="ready-category__item">
                                    <div class="ready-category__item-image">
                                        <img class="tooltip__item-img" src="/assets/img/vegetarian1.svg" alt=""/>
                                    </div>
                                    <div class="ready-category__item-tooltip">
                                        {{ __('product.tooltip_3') }}
                                    </div>
                                </div>
                              @endif
                              @if($productspopel->tooltip4)
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
                        <div class="ready__person">{{$productspopel->name}}</div>
                        <div class="ready__total">
                          <div class="ready__total-price">{{$productspopel->price_full}} руб.</div>
                          <div class="ready__total-weight">{{$productspopel->weight_full}} г. </div>
                        </div>
                        <div class="ready__buttons">
                          <button class="ready__buttons-basket inCartKor js-add-cart" data-id="{{$productspopel->id}}" data-pr="product">в корзину</button>
                          <a class="ready__buttons-link link--arrow-brown inCartOne" data-id="{{$productspopel->id}}" data-pr="product" data-href="{{URL::to('/basket')}}">В 1 клик</a>
                        </div>
                      </div>
                    </div>
                  <?php endif;?>
                  <?php if ($fl):$fl=false;else:$fl=true;endif;?>
                <?php endif;?>
              @endforeach
          </div>
          <!--div class="swiper-pagination ready__pagination default"></div-->
        </div>
        <div class="swiper-button-prev ready__button-prev">
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
        <div class="swiper-button-next ready__button-next">
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
    </section><br>
    <section class="ready wesee">
      <!-- TODO: Не знаю как это будет выставлять для каждого товара или нет, поэтому реализация не ясна -->
      <!-- TODO: Можно сделать унифицированный метод и далее просто у товара заполнять какие из массива выбрать  -->
      <div class="container container--relative">
        @if($prosmotrprod!=null||$prosmotrgotresh!=null)
          <h2 class="ready__title">Вы смотрели</h2>
          <div class="swiper-container wesee__wp">
            <div class="swiper-wrapper">
                      <?php $fl=false?>
                      @if($prosmotrprod!=null)
                        @foreach($prosmotrprod as $productspopel)
                          <?php /*Выборка URL адреса*/
                            $item2 = $productspopel;
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
                          @foreach($productspopel->categoryel as $categoryelem)
                              <?php $pathcat=$categoryelem->url; $namecat=$categoryelem->name; break;?>
                          @endforeach

                          <div class="swiper-slide <?php if ($fl==false):?>swiper-slide--flex<?php endif;?>">
                            <div class="ready__item">
                              <a href="{{ '/menu/'.$pathcat.'/'.$productspopel->url }}">
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
                                    @if($productspopel->tooltip1)
                                      <div class="ready-category__item">
                                          <div class="ready-category__item-image">
                                              <img class="tooltip__item-img"  src="/assets/img/fossil3.svg" alt=""/>
                                          </div>
                                          <div class="ready-category__item-tooltip">
                                              {{ __('product.tooltip_1') }}
                                          </div>
                                      </div>
                                    @endif
                                    @if($productspopel->tooltip2)
                                      <div class="ready-category__item">
                                          <div class="ready-category__item-image">
                                              <img class="tooltip__item-img" src="/assets/img/veganbig.svg" alt=""/>
                                          </div>
                                          <div class="ready-category__item-tooltip">
                                              {{ __('product.tooltip_2') }}
                                          </div>
                                      </div>
                                    @endif
                                    @if($productspopel->tooltip3)
                                      <div class="ready-category__item">
                                          <div class="ready-category__item-image">
                                              <img class="tooltip__item-img" src="/assets/img/vegetarian1.svg" alt=""/>
                                          </div>
                                          <div class="ready-category__item-tooltip">
                                              {{ __('product.tooltip_3') }}
                                          </div>
                                      </div>
                                    @endif
                                    @if($productspopel->tooltip4)
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
                              <div class="ready__person">{{$productspopel->name}}</div>
                              <div class="ready__total">
                                <div class="ready__total-price">{{$productspopel->price_full}} руб.</div>
                                <div class="ready__total-weight">{{$productspopel->weight_full}} г. </div>
                              </div>
                              <div class="ready__buttons">
                                <button class="ready__buttons-basket inCartKor js-add-cart" data-id="{{$productspopel->id}}" data-pr="product">в корзину</button>
                                <a class="ready__buttons-link link--arrow-brown inCartOne" data-id="{{$productspopel->id}}" data-pr="product" data-href="{{URL::to('/basket')}}">В 1 клик</a>
                              </div>
                            </div>
                          </div>
                          
                          <?php if ($fl):$fl=false;else:$fl=true;endif;?>
                        @endforeach
                      @endif
                      <?php $fl=false?>
                      @if($prosmotrgotresh!=null)
                      @foreach($prosmotrgotresh as $productspopel)
                        <?php /*Выборка URL адреса*/
                          $item2 = $productspopel;
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
                        @foreach($productspopel->cataloggrel as $categoryelem)
                          <?php $pathcat=$categoryelem->url; $namecat=$categoryelem->name; break;?>
                        @endforeach

                        <div class="swiper-slide <?php if ($fl==false):?>swiper-slide--flex<?php endif;?>">
                          <div class="ready__item">
                            <a href="{{ '/menu/'.$pathcat.'/'.$productspopel->url }}">
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
                                  @if($productspopel->tooltip1)
                                    <div class="ready-category__item">
                                        <div class="ready-category__item-image">
                                            <img class="tooltip__item-img"  src="/assets/img/fossil3.svg" alt=""/>
                                        </div>
                                        <div class="ready-category__item-tooltip">
                                            {{ __('product.tooltip_1') }}
                                        </div>
                                    </div>
                                  @endif
                                  @if($productspopel->tooltip2)
                                    <div class="ready-category__item">
                                        <div class="ready-category__item-image">
                                            <img class="tooltip__item-img" src="/assets/img/veganbig.svg" alt=""/>
                                        </div>
                                        <div class="ready-category__item-tooltip">
                                            {{ __('product.tooltip_2') }}
                                        </div>
                                    </div>
                                  @endif
                                  @if($productspopel->tooltip3)
                                    <div class="ready-category__item">
                                        <div class="ready-category__item-image">
                                            <img class="tooltip__item-img" src="/assets/img/vegetarian1.svg" alt=""/>
                                        </div>
                                        <div class="ready-category__item-tooltip">
                                            {{ __('product.tooltip_3') }}
                                        </div>
                                    </div>
                                  @endif
                                  @if($productspopel->tooltip4)
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
                            <div class="ready__person">{{$productspopel->name}}</div>
                            <div class="ready__total">
                              <div class="ready__total-price">{{$productspopel->price_full}} руб.</div>
                              <div class="ready__total-weight">{{$productspopel->weight_full}} г. </div>
                            </div>
                            <div class="ready__buttons">
                              <button class="ready__buttons-basket inCartKor" data-id="{{$productspopel->id}}" data-pr="productgr">в корзину</button>
                              <a class="ready__buttons-link link--arrow-brown inCartOne" data-id="{{$productspopel->id}}" data-pr="productgr" data-href="{{URL::to('/basket')}}">В 1 клик</a>
                            </div>
                          </div>
                        </div>
                        
                        <?php if ($fl):$fl=false;else:$fl=true;endif;?>
                      @endforeach
                      @endif
            </div>
            <!--div class="swiper-pagination wesee__pagination default"></div-->
          </div>
          <!-- TODO: Кнопки не работают -->
          <div class="swiper-button-prev wesee__button-prev">
            <svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.469669 6.53033C0.176777 6.23744 0.176777 5.76257 0.469669 5.46967L5.24264 0.696701C5.53553 0.403808 6.01041 0.403808 6.3033 0.696701C6.59619 0.989595 6.59619 1.46447 6.3033 1.75736L2.06066 6L6.3033 10.2426C6.59619 10.5355 6.59619 11.0104 6.3033 11.3033C6.01041 11.5962 5.53553 11.5962 5.24264 11.3033L0.469669 6.53033ZM29 6.75L1 6.75L1 5.25L29 5.25L29 6.75Z" fill="#C8A98D"/>
            </svg>
          </div>
          <div class="swiper-button-next wesee__button-next">
            <svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M28.5303 6.53033C28.8232 6.23744 28.8232 5.76257 28.5303 5.46967L23.7574 0.696701C23.4645 0.403808 22.9896 0.403808 22.6967 0.696701C22.4038 0.989595 22.4038 1.46447 22.6967 1.75736L26.9393 6L22.6967 10.2426C22.4038 10.5355 22.4038 11.0104 22.6967 11.3033C22.9896 11.5962 23.4645 11.5962 23.7574 11.3033L28.5303 6.53033ZM-6.55671e-08 6.75L28 6.75L28 5.25L6.55671e-08 5.25L-6.55671e-08 6.75Z" fill="#C8A98D"/>
            </svg>
          </div>
        @endif
      </div>
    </section>
  </main>
@endsection

