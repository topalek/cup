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
                    <main style="width: 100%">
                        <div class="page-header" style="display: flex; justify-content: space-between;align-items: center">
                            <h2 style="margin-left: 40px">Заказ № {{$order->id}}</h2>
                            <button class="btn btn-info" onclick="window.location.href = '{{route('user.order.download',$order)}}'">Скачать PDF</button>
                        </div>
                        <table class="history-order table">
                            <thead>
                            <tr>
                                <th class="history-order__label">Название</th>
                                <th class="history-order__label">Руб/шт</th>
                                <th class="history-order__label">Кол-во</th>
                                <th class="history-order__label">Всего, руб</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->products as $product)
                                <tr>
                                    <td class="history-order__text">{{$product->name}}</td>
                                    <td class="history-order__text">{{$product->price_per_unit}}</td>
                                    <td class="history-order__text">{{$product->pivot->count}}</td>
                                    <td class="history-order__text">{{$product->pivot->count*$product->price_per_unit}}</td>
                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                    </main>
                </div>
            </div>
        </section>
    </main>
@endsection
