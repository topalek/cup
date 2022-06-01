@extends('layouts.home')
@section('header', 'header-dark')
@section('styles')
    <link rel="stylesheet" href="/css/profile/styles.css">
@endsection


@section('content')
    <main class="padding">
        <section class="personalArea">
            <div class="container">
                <h1>Личный кабинет</h1>
                <div class="items">
                    <a href="/cabinet/personal" class="item var1">
                        <div class="leftBlock">Личные данные</div>
                        <div class="rightBlock">
                            <img src="/assets/img/personal-area-image-1.png" alt="" />
                        </div>
                    </a>
                    <a href="#" class="item var1">
                        <div class="leftBlock">История заказов</div>
                        <div class="rightBlock">
                            <img src="/assets/img/personal-area-image-2.png" alt="" />
                        </div>
                    </a>
                    <a href="#" class="item var2">
                        <div class="leftBlock">
                            <img src="/assets/img/personal-area-image-3.png" alt="" />
                        </div>
                        <div class="rightBlock">Настройки</div>
                    </a>
                    <a href="#" class="item var2">
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

@section('scripts')

@endsection
