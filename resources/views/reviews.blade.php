@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
    <link rel="stylesheet" href="/css/reviews/styles.css">
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
        <section class="reviews">
            <div class="container">
                <h1>{{ $page->h1 }}</h1>
                <a class="giveFeed">Оставить отзыв</a>
                <div class="items">
                    @foreach ($reviews as $item)
                        <div class="item">
                            <div class="top">
                                <div class="name">{{ $item->name }}</div>
                                <div class="date">{{ $item->human_date }}</div>
                            </div>
                            <div class="text">
                                {!! $item->short_text !!}
                            </div>
                            <div class="bottom">
                                <?php
                                  $pathcat='';
                                  $namecat='';
                                ?>
                                @foreach($item->formatel as $categoryelem)
                                  <?php $pathcat=$categoryelem->url; $namecat=$categoryelem->title; break;?>
                                @endforeach
                                @if($namecat!='')
                                  <a href="{{'/format/'.$pathcat}}" class="tag">{{$namecat}}</a>
                                @endif
                                <a href="{{ '/otzyvy/'.$item->url }}" class="more">
                                    Читать весь отзыв
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--a href="#" class="seemore">
                    Показать еще
                    <svg width="8" height="13" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.75056 12.6249C1.54612 12.6253 1.34799 12.5541 1.19056 12.4237C1.10196 12.3502 1.02872 12.26 0.97504 12.1582C0.921357 12.0564 0.888285 11.945 0.877719 11.8304C0.867153 11.7158 0.879299 11.6003 0.913463 11.4904C0.947627 11.3804 1.00314 11.2784 1.07681 11.1899L4.99682 6.49995L1.21681 1.8012C1.14413 1.7117 1.08985 1.60871 1.0571 1.49817C1.02435 1.38762 1.01377 1.27169 1.02596 1.15704C1.03816 1.04239 1.07289 0.931279 1.12817 0.830097C1.18345 0.728915 1.25818 0.639655 1.34806 0.567448C1.4386 0.487791 1.54462 0.427707 1.65947 0.390966C1.77433 0.354226 1.89554 0.341623 2.01549 0.353947C2.13545 0.366271 2.25156 0.403257 2.35655 0.462584C2.46153 0.521911 2.55312 0.602297 2.62556 0.698698L6.85182 5.9487C6.98051 6.10526 7.05087 6.30165 7.05087 6.50432C7.05087 6.70699 6.98051 6.90338 6.85182 7.05995L2.47681 12.3099C2.38904 12.4158 2.27753 12.4995 2.15135 12.5543C2.02516 12.609 1.88786 12.6332 1.75056 12.6249Z" />
                    </svg>
                </a-->
            </div>
        </section>
    </main>
@endsection
