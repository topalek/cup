@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
    <link rel="stylesheet" href="/css/reviews/detail/styles.css">
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

@section('modal')
    @include('include.modal4rev')
@endsection

@section('content')
    <main class="padding">
        <section class="reviewsDetail">
            <div class="container">
                @include('include.bread')
                <h1>Отзыв от {{ $page->name }}</h1>
                <a class="giveFeed">Оставить отзыв</a>
                @if($page->attachment()->get()!=null&&$page->glimg()->first()!=null)
                  <div class="photoReviews">
                      <div class="leftBlock">
                          <div class="top">
                              <div class="date">{{ $human_date }}</div>
                              <?php
                                $pathcat='';
                                $namecat='';
                              ?>
                              @foreach($page->formatel as $categoryelem)
                                <?php $pathcat=$categoryelem->url; $namecat=$categoryelem->title; break;?>
                              @endforeach
                              @if($namecat!='')
                                <a href="{{'/format/'.$pathcat}}" class="tag">{{$namecat}}</a>
                              @endif
                          </div>
                          <div class="name">{{ $page->name }}</div>
                          <div class="text">
                              {!! $page->text !!}
                          </div>
                          <?php
                            $pathcat='';
                            $pathcat2='';
                          ?>
                          @foreach($page->portfitems as $revitem)
                            <?php $pathcat=$revitem->url; ?>
                            @foreach($revitem->categoryelportf as $categoryelportflem)
                                <?php $pathcat2=$categoryelportflem->url; break; ?>
                            @endforeach
                          @endforeach
                          @if($pathcat!='')
                              <a href="{{'/portfolio/'.$pathcat2.'/'.$pathcat}}" class="link--arrow-black">В портфолио</a>
                          @endif
                          <div class="gallery">
                            <?php /*Выборка URL адреса*/
                              $imageres='';
                              $imagesalt='';
                              $imageres2='';
                              $imagesalt2='';
                              $imageres3='';
                              $imagesalt3='';
                              $imageres4='';
                              $imagesalt4='';
                              $image2 = $page->attachment()->get();
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
                              @if($imageres!='')
                                <div class="gallery__item"
                                  href="{{$imageres}}"
                                  data-fancybox="gallery"
                                  >
                                    <img src="{{$imageres}}" alt="{{$imagesalt}}" />
                                </div>
                              @endif
                              @if($imageres2!='')
                                <div class="gallery__item"
                                  href="{{$imageres2}}"
                                  data-fancybox="gallery"
                                  >
                                    <img src="{{$imageres2}}" alt="{{$imagesalt2}}" />
                                </div>
                              @endif
                              @if($imageres3!='')
                                <div class="gallery__item"
                                  href="{{$imageres3}}"
                                  data-fancybox="gallery"
                                  >
                                    <img src="{{$imageres3}}" alt="{{$imagesalt3}}" />
                                </div>
                              @endif
                              @if($imageres4!='')
                                <div class="gallery__item"
                                  href="{{$imageres4}}"
                                  data-fancybox="gallery"
                                  >
                                    <img src="{{$imageres4}}" alt="{{$imagesalt4}}" />
                                </div>
                              @endif
                          </div>
                      </div>
                      <div class="rightBlock">
                          <?php /*Выборка URL адреса*/
                              $imageres='';
                              $imagesalt='';
                              $image2='';
                              if(($page->glimg()->first())!=null){
                                $image2 = $page->glimg()->first()->url();
                                $imageres=$image2;
                                $imagesalt=$page->title;
                              }
                          ?>
                          @if($imageres!='')
                            <img src="{{$imageres}}" alt="{{$imagesalt}}" />
                          @else
                            <img src="/assets/img/big-reviews-image-1.png" alt="{{$imagesalt}}" />
                          @endif
                      </div>
                  </div>
                @else
                  <div class="reviews">
                      <div class="top">
                          <div class="date">{{ $human_date }}</div>
                          <div class="tag">Фуршет</div>
                      </div>
                      <div class="name">{{ $page->name }}</div>
                      <div class="text">
                          {!! $page->text !!}
                      </div>
                  </div>
                @endif
            </div>
        </section>
    </main>
@endsection
