@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <section class="login">
      <div class="login__decor">
        <img src="/assets/img/login-decor.png" alt="" />
      </div>
      <div class="container">
        <h1>{{$page->h1}}</h1>
        <form action="{{route('user.restorex')}}" enctype="multipart/form-data" method="post" class="login__form">
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
          <div class="login__form-group">
            <input 
              type="text"
              placeholder="info@mail.ru" 
              required
              name="email"
              
            />
            <label for="">E-mail*</label>
          </div>
          <button class="events__link-item link--arrow-black">
            отправить
          </button>
        </form>
        <br>
      </div>
    </section>
  </main>
@endsection
