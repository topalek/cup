@extends('layouts.home')

@section('header', 'header-white')

@section('styles')
    <link rel="stylesheet" href="/css/service/styles.css">
@endsection

@section('scripts')
    <script src="/js/service.js"></script>
    <script src="/js/quiz/app.js"></script>
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
        <div class="category">
            <div class="container">
                <div class="categories__tabs">
                  <div class="categories__tab categories__tab--active" data-id="1">
                    Форматы
                  </div>
                  <div class="categories__tab" data-id="2">Повод</div>
                </div>
                <div class="categories__bottom">
                  <div
                    class="categories__bottom-item categories__bottom-item--active"
                    data-id="1">
                    <?php $fl2=0?>
                    @foreach($catformat as $catformatel)
                      <?php /*Выборка URL адреса*/
                        $item3 = $catformatel;
                        $imageresor3='';
                        $imagalt3='';
                        $image3='';
                        if(($item3->glimg()->first())!=null){
                          $image3 = $item3->glimg()->first()->url();
                        }
                        if ($image3!=null):
                          $imageresor3=$image3;
                          $imagalt3=$catformatel->title;
                        endif;
                      ?>
                      @if(($catformatel->active)!='0')
                          @if($fl2==0)
                            <div class="categories__items categories__items--1">
                              <a href="{{ '/format/'.$catformatel['url'] }}" class="categories__item categories__item--1">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                          @endif
                          @if($fl2==1)
                              <a href="{{ '/format/'.$catformatel['url'] }}" class="categories__item categories__item--1">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                          @endif
                          @if($fl2==2)
                              <a href="{{ '/format/'.$catformatel['url'] }}" class="categories__item categories__item--2">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                            </div>
                          @endif
                          @if($fl2==3)
                            <div class="categories__items categories__items--2">
                              <a href="{{ '/format/'.$catformatel['url'] }}" class="categories__item categories__item--3">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                          @endif
                          @if($fl2==4)
                              <a href="{{ '/format/'.$catformatel['url'] }}" class="categories__item categories__item--4">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                            </div>
                          @endif
                          @if($fl2==5)
                            <div class="categories__items categories__items--4">
                              <a href="{{ '/format/'.$catformatel['url'] }}" class="categories__item categories__item--4">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                          @endif
                          @if($fl2==6)
                              <a href="{{ '/format/'.$catformatel['url'] }}" class="categories__item categories__item--5">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                          @endif
                          @if($fl2==7)
                              <a href="{{ '/format/'.$catformatel['url'] }}" class="categories__item categories__item--6">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                            </div>
                          @endif
                          @if($fl2==8)
                            <div class="categories__items categories__items--3">
                              <a href="{{ '/format/'.$catformatel['url'] }}" class="categories__item categories__item--7">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                          @endif
                          @if($fl2==9)
                              <a href="{{ '/format/'.$catformatel['url'] }}" class="categories__item categories__item--8">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                            </div>
                          @endif
                        <?php $fl2++;?>
                      @endif
                    @endforeach
                    @if($fl2<=2||$fl2==4||$fl2==6||$fl2==7||$fl2==9)
                      </div>
                    @endif
                  </div>
                  <div class="categories__bottom-item" data-id="2">
                    <?php $fl2=0?>
                    @foreach($povodi as $catformatel)
                      <?php /*Выборка URL адреса*/
                        $item3 = $catformatel;
                        $imageresor3='';
                        $imagalt3='';
                        $image3='';
                        if(($item3->glimg()->first())!=null){
                            $image3 = $item3->glimg()->first()->url();
                        }
                        if ($image3!=null):
                            $imageresor3=$image3;
                            $imagalt3=$catformatel->title;
                        endif;
                      ?>
                      @if(($catformatel->active)!='0')
                          @if($fl2==0)
                            <div class="categories__items categories__items--1">
                              <a href="{{ '/povod/'.$catformatel['url'] }}" class="categories__item categories__item--1">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                          @endif
                          @if($fl2==1)
                              <a href="{{ '/povod/'.$catformatel['url'] }}" class="categories__item categories__item--1">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                          @endif
                          @if($fl2==2)
                              <a href="{{ '/povod/'.$catformatel['url'] }}" class="categories__item categories__item--2">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                            </div>
                          @endif
                          @if($fl2==3)
                            <div class="categories__items categories__items--2">
                              <a href="{{ '/povod/'.$catformatel['url'] }}" class="categories__item categories__item--3">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                          @endif
                          @if($fl2==4)
                              <a href="{{ '/povod/'.$catformatel['url'] }}" class="categories__item categories__item--4">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                            </div>
                          @endif
                          @if($fl2==5)
                            <div class="categories__items categories__items--4">
                              <a href="{{ '/povod/'.$catformatel['url'] }}" class="categories__item categories__item--4">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                          @endif
                          @if($fl2==6)
                              <a href="{{ '/povod/'.$catformatel['url'] }}" class="categories__item categories__item--5">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                          @endif
                          @if($fl2==7)
                              <a href="{{ '/povod/'.$catformatel['url'] }}" class="categories__item categories__item--6">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                            </div>
                          @endif
                          @if($fl2==8)
                            <div class="categories__items categories__items--3">
                              <a href="{{ '/povod/'.$catformatel['url'] }}" class="categories__item categories__item--7">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                          @endif
                          @if($fl2==9)
                              <a href="{{ '/povod/'.$catformatel['url'] }}" class="categories__item categories__item--8">
                                <div class="categories__item-image">
                                  <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                                </div>
                                {{$catformatel->title}}
                              </a>
                            </div>
                          @endif
                        <?php $fl2++;?>
                      @endif
                    @endforeach
                    @if($fl2<=2||$fl2==4||$fl2==6||$fl2==7||$fl2==9)
                      </div>
                    @endif
                  </div>
                </div>
            </div>
        </div>
        <!-- QUIZ -->
        <div id="quizelem"></div>
        <!-- QUIZ -->
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
                    <a href="/portfolio" class="events__next-link link--arrow-brown">Смотреть ещё</a>
                </div>
            </div>
        </section>
        <!-- Форма обратной связи -->
        @include('include.form')
    </main>
@endsection


