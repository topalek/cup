@extends('layouts.home')

@section('header', 'header-white')

@section('styles')
    <link rel="stylesheet" href="/css/welcom/styles.css">
@endsection
@section('scripts')
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
<main>
  <section class="hero">
    <div class="container">
      <h1 class="hero__title">{{$page['h1']}}</h1>
      <p class="hero__text">
        {{strip_tags($page['description'])}}
      </p>
      <div class="hero__item">
        <a class="hero__link premium__link link--arrow-white">Заказать мероприятие</a
        >
      </div>
    </div>
  </section>
  <br><br>
  @include('include.bread')
  
  <section class="video">
    <div class="container">
      <div class="video__inner">
        <div class="video__content">
          <div class="video__item">
            <?php
              $fltext="<iframe width='100%' height='100%' src='https://www.youtube.com/embed/".$format->linkvideo."' title='".$format->title."' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
            ?>
            @if(isset($format->linkvideo))
              <div class="video__item-play">
                  <?php echo $fltext?>
              </div>
            @endif
          </div>
          <div class="video__text">
            {!!$format->desc!!}
          </div>
      </div>
      </div>
    </div>
  </section>
  <section class="gallery">
    <div class="container">
      <div class="gallery__items">
        <?php /*Выборка URL адреса*/
            $item = $format;
            $imageres='';
            $imagesalt='';
            $imageres2='';
            $imagesalt2='';
            $imageres3='';
            $imagesalt3='';
            $imageres4='';
            $imagesalt4='';
            $linkvideo='';
          
            $image2 = $item->attachment()->get();

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
          <div class="gallery__item-image gallery__item-image--bigz">
            <img
              class="gallery__item-img"
              src="{{$imageres}}"
              alt="{{$imagesalt}}"
            />
          </div>
        @endif
        @if($imageres2!='')
          <div class="gallery__item-image gallery__item-image--smallz">
            <img
              class="gallery__item-img"
              src="{{$imageres2}}"
              alt="{{$imagesalt2}}"
            />
          </div>
        @endif
        @if($imageres3!='')
          <div class="gallery__item-image gallery__item-image--smallz">
            <img
              class="gallery__item-img"
              src="{{$imageres3}}"
              alt="{{$imagesalt3}}"
            />
          </div>
        @endif
        @if($imageres4!='')
          <div class="gallery__item-image gallery__item-image--bigz">
            <img
              class="gallery__item-img"
              src="{{$imageres4}}"
              alt="{{$imagesalt4}}"
            />
          </div>
        @endif
      </div>
    </div>
  </section>
  <!-- Форма обратной связи -->
  @include('include.form')
</main>
@endsection

@section('modal')
    @include('include.modal3uslugi')
@endsection