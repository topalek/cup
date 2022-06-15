@extends('layouts.pdf')
@section('content')
    <main style="width: 100%">
        <h2 style="margin-left: 40px">Заказ № {{$order->id}}</h2>
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
@endsection
