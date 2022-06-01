@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/settings/styles.css">
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
    <div class="page-dekor">
      <img src="/assets/img/personal-area-dekor.png" alt="" />
    </div>
    <div class="container">
      <h1>{{$page->h1}}</h1>
      <div class="personalArea__wrap">
        @include('include.menulk')
        <form action="{{route('user.setsavepas')}}" enctype="multipart/form-data" method="post" class="personalArea__form">
          @csrf
          @if (Session::has('error'))
            <div class="errorsgl"><br>
                {{Session::get('error')}}
            </div>
          @endif
          @if (Session::has('success'))
            <div class="noerrors"><br>
                {{Session::get('success')}}
            </div>
          @endif
          <div class="title">Сменить пароль</div>
          <div class="input-group">
            <input
              type="password"
              required
              name="oldpassword"
              placeholder="Введите текущий пароль"
            />
            <label for="">Текущий пароль</label>
          </div>
          <div class="input-group">
            <input
              type="password"
              name="password"
              required
              autocomplete="current-password"
              placeholder="Введите новый пароль"
            />
            <label for="">Новый пароль</label>
          </div>
          <div class="input-group">
            <input
              type="password"
              placeholder="Введите новый пароль еще раз"
              required
              autocomplete="current-password"
              name="password_confirmation" />
            <label for="">Повторите пароль</label>
          </div>
          <div class="link__wr">
            <button class="link--arrow-black" type="submit" >Сохранить</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</main>
<br>
@endsection
