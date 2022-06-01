@extends('layouts.home')
@section('header', 'header-dark')

@section('styles')
    <link rel="stylesheet" href="/css/company/styles.css">
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
            <h1 class="hero__title">{{ $page->h1 }}</h1>
            <div class="hero__text">
              {{$page->subtitle}}
            </div>
            <div class="hero__item">
              <a class="premium__link hero__link link--arrow-black">Заказать мероприятие</a>
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
        <section class="garant">
          <div class="container">
            <h2 class="garant__title">Гарантия качества от Cupcatering</h2>
            <div class="garant__items">
              <?php $fl2=0?>
              @foreach($garkach as $item)
                <?php /*Выборка URL адреса*/
                  $imageresor3='';
                  $imagalt3='';
                  $image3='';
                  if(($item->glimg()->first())!=null){
                      $image3 = $item->glimg()->first()->url();
                  }
                  if ($image3!=''):
                      $imageresor3=$image3;
                      $imagalt3=$item->title;
                  endif;
                ?>
                @if($fl2==0)
                  <div class="garant__item garant__item-heght1">
                    <img
                      src="{{$imageresor3}}"
                      class="garant__item-img"
                      alt="{{$imagalt3}}"
                    />
                    <div class="garant__item-text">{{$item->title}}</div>
                  </div>
                @endif
                @if($fl2==1)
                  <div class="garant__item garant__item-heght2">
                    <img
                      src="{{$imageresor3}}"
                      class="garant__item-img"
                      alt="{{$imagalt3}}"
                    />
                    <div class="garant__item-text">{{$item->title}}</div>
                  </div>
                @endif
                @if($fl2==2)
                  <div class="garant__item garant__item-heght3">
                    <div class="garant__item-content garant__item-content--size1">
                      <img
                        src="{{$imageresor3}}"
                        class="garant__item-img"
                        alt="{{$imagalt3}}"
                      />
                      <div class="garant__item-text">{{$item->title}}</div>
                    </div>
                @endif
                @if($fl2==3)
                    <div class="garant__item-content garant__item-content--size2">
                      <img
                        src="{{$imageresor3}}"
                        class="garant__item-img"
                        alt="{{$imagalt3}}"
                      />
                      <div class="garant__item-text">{{$item->title}}</div>
                    </div>
                  </div>
                @endif
                @if($fl2==4)
                  <div class="garant__item garant__item-heght4">
                    <img
                      src="{{$imageresor3}}"
                      class="garant__item-img"
                      alt="{{$imagalt3}}"
                    />
                    <div class="garant__item-text">{{$item->title}}</div>
                  </div>
                @endif
                <?php $fl2++; if($fl2>=6){break;};?>
              @endforeach
              @if($fl2==3)
                </div>
              @endif
            </div>
          </div>
        </section>
        <section class="person-chef">
          <h2>Команда любящих свое дело. «Наши люди»</h2>
          <div class="person-chef__items">
            <div class="container">
              @foreach($ourp as $item)
                <?php /*Выборка URL адреса*/
                  $imageresor3='';
                  $imagalt3='';
                  $image3='';
                  if(($item->attachment()->first())!=null){
                      $image3 = $item->attachment()->first();
                  }
                  if ($image3!=''):
                      $imageresor3=$image3['url'];
                      $imagalt3=$image3['alt'];
                  endif;
                ?>
                <div class="person-chef__item">
                  <div class="person-chef__item-left">
                    <div class="person-chef__item-image">
                      <img src="{{$imageresor3}}" alt="{{$imagalt3}}" />
                    </div>
                    <div class="person-chef__item-name">{{$item->title}}</div>
                    <div class="person-chef__item-position">{{$item->dolzhn}}</div>
                  </div>
                  <div class="person-chef__item-text">
                      <?php $descinhtm = html_entity_decode($item->desc); echo $descinhtm;?>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </section>

        @include('include.formhavequestion')
    </main>
@endsection
