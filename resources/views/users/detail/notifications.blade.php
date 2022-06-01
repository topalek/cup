@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/settings/styles.css">
  <link rel="stylesheet" href="/css/notifications/styles.css">
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
        <div class="notifications">
          <div class="notifications__item notifications__item--photo">
            <div class="notifications__image">
              <img src="/assets/img/blog-image.png" alt="" />
            </div>
            <div class="notifications__wrap">
              <div class="notifications__date">04.05.2022 12:53</div>
              <div class="notifications__title">Заголовок уведомления</div>
              <div class="notifications__text">
                <p>
                  Текст уведомления служба Яндекс.Рефераты предназначена для
                  студентов и школьников, дизайнеров и журналистов,
                  создателей научных заявок и отчетов — для всех, кто
                  относится к тексту, как к количеству знаков. Нажав на
                  кнопку «Написать реферат», вы лично создаете уникальный
                  текст, причем именно от вашего нажатия на кнопку зависит,
                  какой именно текст получится — таким образом, авторские
                  права на реферат принадлежат только вам.
                </p>
              </div>
            </div>
          </div>
          <div class="notifications__item">
            <div class="notifications__wrap">
              <div class="notifications__date">04.05.2022 12:53</div>
              <div class="notifications__title">Заголовок уведомления</div>
              <div class="notifications__text">
                <p>
                  Текст уведомления служба Яндекс.Рефераты предназначена для
                  студентов и школьников, дизайнеров и журналистов,
                  создателей научных заявок и отчетов — для всех, кто
                  относится к тексту, как к количеству знаков. Нажав на
                  кнопку «Написать реферат», вы лично создаете уникальный
                  текст, причем именно от вашего нажатия на кнопку зависит,
                  какой именно текст получится — таким образом, авторские
                  права на реферат принадлежат только вам.
                </p>
              </div>
            </div>
          </div>
          <div class="notifications__item">
            <div class="notifications__wrap">
              <div class="notifications__date">04.05.2022 12:53</div>
              <div class="notifications__title">Заголовок уведомления</div>
              <div class="notifications__text">
                <p>
                  Текст уведомления служба Яндекс.Рефераты предназначена для
                  студентов и школьников, дизайнеров и журналистов,
                  создателей научных заявок и отчетов — для всех, кто
                  относится к тексту, как к количеству знаков. Нажав на
                  кнопку «Написать реферат», вы лично создаете уникальный
                  текст, причем именно от вашего нажатия на кнопку зависит,
                  какой именно текст получится — таким образом, авторские
                  права на реферат принадлежат только вам.
                </p>
                <p>
                  Текст уведомления служба Яндекс.Рефераты предназначена для
                  студентов и школьников, дизайнеров и журналистов,
                  создателей научных заявок и отчетов — для всех, кто
                  относится к тексту, как к количеству знаков. Нажав на
                  кнопку «Написать реферат», вы лично создаете уникальный
                  текст, причем именно от вашего нажатия на кнопку зависит,
                  какой именно текст получится — таким образом, авторские
                  права на реферат принадлежат только вам.
                </p>
                <p>
                  Текст уведомления служба Яндекс.Рефераты предназначена для
                  студентов и школьников, дизайнеров и журналистов,
                  создателей научных заявок и отчетов — для всех, кто
                  относится к тексту, как к количеству знаков. Нажав на
                  кнопку «Написать реферат», вы лично создаете уникальный
                  текст, причем именно от вашего нажатия на кнопку зависит,
                  какой именно текст получится — таким образом, авторские
                  права на реферат принадлежат только вам.
                </p>
              </div>
            </div>
          </div>
          <div class="pagination">
            <a href="#" class="pagination__item pagination__item--active">
              1
            </a>
            <a href="#" class="pagination__item"> 2 </a>
            <a href="#" class="pagination__item"> 3 </a>
            <div class="pagination__dots">...</div>
            <a href="#" class="pagination__item"> 6 </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<br>
@endsection
