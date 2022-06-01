@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/profile/styles.css">
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
  <main class="padding">
    <section class="personalArea">
        <div class="container">
            <h1>{{$page->h1}}</h1>
            <div class="items">
                <a href="{{route('user.personal')}}" class="item var1">
                    <div class="leftBlock">Личные данные</div>
                    <div class="rightBlock">
                        <img src="/assets/img/personal-area-image-1.png" alt="" />
                    </div>
                </a>
                <a href="{{route('user.history')}}" class="item var1">
                    <div class="leftBlock">История заказов</div>
                    <div class="rightBlock">
                        <img src="/assets/img/personal-area-image-2.png" alt="" />
                    </div>
                </a>
                <a href="{{route('user.settings')}}" class="item var2">
                    <div class="leftBlock">
                        <img src="/assets/img/personal-area-image-3.png" alt="" />
                    </div>
                    <div class="rightBlock">Настройки</div>
                </a>
                <a href="{{route('user.notifications')}}" class="item var2">
                    <div class="leftBlock">
                        <img src="/assets/img/personal-area-image-4.png" alt="" />
                    </div>
                    <div class="rightBlock">Уведомления</div>
                </a>
            </div>
        </div>
    </section>
  </main>
  
@endsection
