@extends('layouts.home')

@section('header', 'header-white')

@section('styles')
  <link rel="stylesheet" href="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css" />
  <link rel="stylesheet" href="/css/oformlenie/styles.css">
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
    <section class="hero">
        <div class="container">
            <h1 class="hero__title">{{$page->h1}}</h1>
            <p class="hero__text">
              {{$page->subtitle}}
            </p>
            <div class="hero__item">
                <a class="premium__link hero__link link--arrow-white">Заказать мероприятие</a>
            </div>
        </div>
    </section>
    <section class="style">
        <div class="style__decor"></div>
        <div class="container">
            <h2 class="style__title">Стили оформления для взрослого стола</h2>
            <div class="style__items">
                <?php $fl2=1?>
                @foreach($oformlenievz as $oformlenievzel)
                  <?php /*Выборка URL адреса*/
                    $item2 = $oformlenievzel;
                    $imageresor='';
                    $imagalt='';
                    $image = $item2->attachment()->first();
                    if ($image!=null):
                      $imageresor=$image['url'];
                      $imagalt=$image['alt'];
                    endif;
                  ?>
                  <?php if(($oformlenievzel->active)!='0'):?>
                    <?php if($fl2==1):?>
                      <div class="style__item">
                          <div class="style__item-image">
                              <img src="{{$imageresor}}" class="style__item-img" alt="{{$imagalt}}" />
                          </div>
                          <div class="style__item-content">
                              <div class="style__item-title">{{$oformlenievzel['name']}}</div>
                              <div class="style__item-text">
                                <?php $descinhtm = html_entity_decode($oformlenievzel['shortdesc']);echo $descinhtm;?>
                              </div>
                              <a href="{{'/oformlenie/'.$oformlenievzel->url}}" class="style__item-link link--arrow-brown">Подробнее</a>
                          </div>
                      </div>
                    <?php endif;?>
                    <?php if($fl2==2):?>
                      <div class="style__item style__item--width">
                          <div class="style__item-image">
                              <img src="{{$imageresor}}" class="style__item-img" alt="{{$imagalt}}" />
                          </div>
                          <div class="style__item-content">
                              <div class="style__item-title">{{$oformlenievzel['name']}}</div>
                              <div class="style__item-text">
                                <?php $descinhtm = html_entity_decode($oformlenievzel['shortdesc']);echo $descinhtm;?>
                              </div>
                              <a href="{{'/oformlenie/'.$oformlenievzel->url}}" class="style__item-link link--arrow-brown">Подробнее</a>
                          </div>
                      </div>
                    <?php endif;?>
                    <?php if($fl2==3):?>
                      <div class="style__item style__item--reverse style__item--width">
                          <div class="style__item-image">
                              <img src="{{$imageresor}}" class="style__item-img" alt="{{$imagalt}}" />
                          </div>
                          <div class="style__item-content">
                              <div class="style__item-title">{{$oformlenievzel['name']}}</div>
                              <div class="style__item-text">
                                <?php $descinhtm = html_entity_decode($oformlenievzel['shortdesc']);echo $descinhtm;?>
                              </div>
                              <a href="{{'/oformlenie/'.$oformlenievzel->url}}" class="style__item-link link--arrow-brown">Подробнее</a>
                          </div>
                      </div>
                    <?php endif;?>
                    <?php if($fl2==4):?>
                      <div class="style__item style__item--reverse">
                          <div class="style__item-image">
                              <img src="{{$imageresor}}" class="style__item-img" alt="{{$imagalt}}" />
                          </div>
                          <div class="style__item-content">
                              <div class="style__item-title">{{$oformlenievzel['name']}}</div>
                              <div class="style__item-text">
                                <?php $descinhtm = html_entity_decode($oformlenievzel['shortdesc']);echo $descinhtm;?>
                              </div>
                              <a href="{{'/oformlenie/'.$oformlenievzel->url}}" class="style__item-link link--arrow-brown">Подробнее</a>
                          </div>
                      </div>
                    <?php endif;?>
                  <?php endif;?>
                  <?php $fl2++; if($fl2>=5){$fl2=1;};?>
                @endforeach
            </div>
        </div>
    </section>
    <section class="style">
        <div class="container">
            <h2 class="style__title">Стили оформления для детского стола</h2>
            <div class="style__items">
                <?php $fl2=1?>
                @foreach($oformleniedet as $oformleniedetel)
                  <?php /*Выборка URL адреса*/
                    $item2 = $oformleniedetel;
                    $imageresor='';
                    $imagalt='';
                    $image = $item2->attachment()->first();
                    if ($image!=null):
                      $imageresor=$image['url'];
                      $imagalt=$image['alt'];
                    endif;
                  ?>
                  <?php if(($oformleniedetel->active)!='0'):?>
                    <?php if($fl2==1):?>
                      <div class="style__item">
                          <div class="style__item-image">
                              <img src="{{$imageresor}}" class="style__item-img" alt="{{$imagalt}}" />
                          </div>
                          <div class="style__item-content">
                              <div class="style__item-title">{{$oformleniedetel['name']}}</div>
                              <div class="style__item-text">
                                <?php $descinhtm = html_entity_decode($oformleniedetel['shortdesc']);echo $descinhtm;?>
                              </div>
                              <a href="{{'/oformleniedet/'.$oformleniedetel->url}}" class="style__item-link link--arrow-brown">Подробнее</a>
                          </div>
                      </div>
                    <?php endif;?>
                    <?php if($fl2==2):?>
                      <div class="style__item style__item--width">
                          <div class="style__item-image">
                              <img src="{{$imageresor}}" class="style__item-img" alt="{{$imagalt}}" />
                          </div>
                          <div class="style__item-content">
                              <div class="style__item-title">{{$oformleniedetel['name']}}</div>
                              <div class="style__item-text">
                                <?php $descinhtm = html_entity_decode($oformleniedetel['shortdesc']);echo $descinhtm;?>
                              </div>
                              <a href="{{'/oformleniedet/'.$oformleniedetel->url}}" class="style__item-link link--arrow-brown">Подробнее</a>
                          </div>
                      </div>
                    <?php endif;?>
                    <?php if($fl2==3):?>
                      <div class="style__item style__item--reverse style__item--width">
                          <div class="style__item-image">
                              <img src="{{$imageresor}}" class="style__item-img" alt="{{$imagalt}}" />
                          </div>
                          <div class="style__item-content">
                              <div class="style__item-title">{{$oformleniedetel['name']}}</div>
                              <div class="style__item-text">
                                <?php $descinhtm = html_entity_decode($oformleniedetel['shortdesc']);echo $descinhtm;?>
                              </div>
                              <a href="{{'/oformleniedet/'.$oformleniedetel->url}}" class="style__item-link link--arrow-brown">Подробнее</a>
                          </div>
                      </div>
                    <?php endif;?>
                    <?php if($fl2==4):?>
                      <div class="style__item style__item--reverse">
                          <div class="style__item-image">
                              <img src="{{$imageresor}}" class="style__item-img" alt="{{$imagalt}}" />
                          </div>
                          <div class="style__item-content">
                              <div class="style__item-title">{{$oformleniedetel['name']}}</div>
                              <div class="style__item-text">
                                <?php $descinhtm = html_entity_decode($oformleniedetel['shortdesc']);echo $descinhtm;?>
                              </div>
                              <a href="{{'/oformleniedet/'.$oformleniedetel->url}}" class="style__item-link link--arrow-brown">Подробнее</a>
                          </div>
                      </div>
                    <?php endif;?>
                  <?php endif;?>
                  <?php $fl2++; if($fl2>=5){$fl2=1;};?>
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
                <div class="swiper-pagination events__pagination default"></div>
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
    <!-- Форма обратной связи -->
    @include('include.form')
</main>
@endsection