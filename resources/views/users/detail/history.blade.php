@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/settings/styles.css">
    <link rel="stylesheet" href="/css/history-order/styles.css">
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
                <img src="/assets/img/personal-area-dekor.png" alt=""/>
            </div>
            <div class="container">
                <h1>{{$page->h1}}</h1>
                <div class="personalArea__wrap">
                    @include('include.menulk')
                    <div class="history-order">
                        @forelse($orders as $order)
                            <div class="history-order__item">
                                <div class="history-order__info">
                                    <div class="history-order__col">
                                        <div class="history-order__label">Номер заказа</div>
                                        <div class="history-order__text">{{$order->id}}</div>
                                    </div>
                                    <div class="history-order__col">
                                        <div class="history-order__label">Дата заказа</div>
                                        <div class="history-order__text">{{$order->created_at->format('d.m.Y')}}</div>
                                    </div>
                                    <div class="history-order__col">
                                        <div class="history-order__label">Стоимость, руб</div>
                                        <div class="history-order__text">{{$order->total_price}}</div>
                                    </div>
                                </div>
                                <a href="{{route('user.order',$order)}}" class="history-order__more">Подробнее</a>
                            </div>
                        @empty
                            <p>У Вас пока нет заказов</p>
                        @endforelse
                            {{$orders->links('layouts.parts.pagination')}}

                            {{--                            <div class="pagination">--}}
{{--                                <a href="#" class="pagination__item pagination__item--active">--}}
{{--                                    1--}}
{{--                                </a>--}}
{{--                                <a href="#" class="pagination__item"> 2 </a>--}}
{{--                                <a href="#" class="pagination__item"> 3 </a>--}}
{{--                                <div class="pagination__dots">...</div>--}}
{{--                                <a href="#" class="pagination__item"> 6 </a>--}}
{{--                            </div>--}}
                    </div>
                </div>
            </div>
        </section>
    </main>
    <br>
@endsection
