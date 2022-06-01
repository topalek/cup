@extends('layouts.home')
@section('header', 'header-dark')

@section('styles')
    <link rel="stylesheet" href="/css/error/styles.css">
@endsection

@section('title')
    <title>ошибка 404</title>
@endsection
@section('description')
    <meta name="description" content="ошибка 404">
@endsection
@section('keywords')
    <meta name="keywords" content="">
@endsection

@section('content')
    <main>
        <section class="error">
          <div class="error-image">
            <img class="error-img" src="/assets/img/error404.png" alt="" />
          </div>
          <div class="container">
            <div class="error__box">
              <div class="error__inner">
                <h1 class="error-title">ошибка 404</h1>
                <div class="error-notfound">СТРАНИЦА НЕ НАЙДЕНА</div>
                <div class="error__content">
                  <div class="error__content-title">
                    ЭТО МОГЛО ПРОИЗОЙТИ В СЛУЧАЯХ, ЕСЛИ:
                  </div>
                  <ul class="error__list">
                    <li class="error__list-item">- был изменен URL;</li>
                    <li class="error__list-item">- страница была удалена;</li>
                    <li class="error__list-item">- ошибка в написании ссылки</li>
                  </ul>
                </div>
                <div class="error-text">
                  Вы можете перейти <a class="error-link" href="/"> на главную</a>
                </div>
              </div>
            </div>
          </div>
        </section>
    </main>
@endsection
