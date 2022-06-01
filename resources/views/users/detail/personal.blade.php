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
        <form action="{{route('user.savedata')}}" method="post" class="personalArea__form">
          @csrf
          <div class="title">Личные данные</div>
          <div class="input-group">
            <input
              type="text"
              name="fio"
              placeholder="Иван"
              value="{{$user->fio}}"/>
            <label for="">Ваше имя</label>
          </div>
          <div class="input-group">
            <input
              type="text"
              name="phone"
              placeholder="+7 (900) 123 45 67"
              value="{{$user->phone}}"
            />
            <label for="">Телефон</label>
          </div>
          <div class="input-group">
            <input
              type="text"
              name="email"
              placeholder=""
              value="{{$user->email}}"
            />
            <label for="">E-Mail</label>
          </div>
          <div class="input-group">
            <input
              type="text"
              name="name"
              placeholder=""
              value="{{$user->name}}"
            />
            <label for="">Логин</label>
          </div>
          <div class="title delivery">Доставка</div>
          <div class="city">
            <div class="input-group city">
              <input
                type="text"
                name="city"
                placeholder="Морозовск"
                value="{{$user->city}}"/>
              <label for="">Город</label>
            </div>
            <!--div class="radio-group">
              <input type="radio" name="city" id="rostov" />
              <label for="rostov">Ростов-на-Дону</label>
            </div>
            <div class="radio-group">
              <input type="radio" name="city" id="other" />
              <label for="other">Другой</label>
            </div-->
          </div>
          <div class="house">
            <div class="input-group street">
              <input
                type="text"
                name="street"
                placeholder="Петроградская"
                value="{{$user->street}}"
              />
              <label for="">Улица</label>
            </div>
            <div class="input-group home">
              <input type="text" name="dom" placeholder="12" value="{{$user->dom}}"/>
              <label for="">Дом</label>
            </div>
          </div>
          <div class="input-group">
              <input 
                type="text"
                name="com"
                value="{{$user->com}}"/>
              <label for="">Комментарий</label>
          </div>
          <div class="link__wr">
            <button class="link--arrow-black" type="submit"
              >Сохранить</button>
              @if(Session::has('success')){{Session::get('success')}}@endif
          </div>
        </form>
      </div>
    </div>
  </section>
</main>
<br>
@endsection
