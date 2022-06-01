@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
    <link rel="stylesheet" href="/css/dostavka/styles.css">
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
        <section class="delivery">
            <div class="container">
                <h1>{{ $page->h1 }}</h1>
                <div class="items">
                    <div class="item">
                        <div class="leftBlock">
                            <svg width="47" height="36" viewBox="0 0 47 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.3327 34.3333C15.91 34.3333 17.9993 32.244 17.9993 29.6667C17.9993 27.0893 15.91 25 13.3327 25C10.7554 25 8.66602 27.0893 8.66602 29.6667C8.66602 32.244 10.7554 34.3333 13.3327 34.3333Z"
                                    stroke="#C8A98D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M36.6667 34.3333C39.244 34.3333 41.3333 32.244 41.3333 29.6667C41.3333 27.0893 39.244 25 36.6667 25C34.0893 25 32 27.0893 32 29.6667C32 32.244 34.0893 34.3333 36.6667 34.3333Z"
                                    stroke="#C8A98D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M27.3327 4H38.9993L45.9993 15.6667M8.66602 29.6667H3.99935V20.3333L8.66602 29.6667ZM1.66602 1.66666H27.3327V29.6667L1.66602 1.66666ZM17.9993 29.6667H31.9993H17.9993ZM41.3327 29.6667H45.9993V15.6667H27.3327L41.3327 29.6667Z"
                                    stroke="#C8A98D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4 11H13.3333" stroke="#C8A98D" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="rightBlock">
                            <div class="title">{{$page->doptitle1}}</div>
                            <div class="price">{{$page->doptxt3}}</div>
                            <div class="notation">{{strip_tags($page->doptxt1)}}</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="leftBlock">
                            <svg width="48" height="34" viewBox="0 0 48 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M32.75 22.8333C32.2859 22.8333 31.8408 23.0177 31.5126 23.3459C31.1844 23.6741 31 24.1192 31 24.5833C31 25.0475 31.1844 25.4926 31.5126 25.8208C31.8408 26.149 32.2859 26.3333 32.75 26.3333H38.5833C39.0475 26.3333 39.4926 26.149 39.8208 25.8208C40.149 25.4926 40.3333 25.0475 40.3333 24.5833C40.3333 24.1192 40.149 23.6741 39.8208 23.3459C39.4926 23.0177 39.0475 22.8333 38.5833 22.8333H32.75Z"
                                    fill="#C8A98D" />
                                <path
                                    d="M7.08268 0.666664C5.38088 0.666664 3.74877 1.3427 2.54541 2.54606C1.34206 3.74942 0.666016 5.38153 0.666016 7.08333V26.9167C0.666016 28.6185 1.34206 30.2506 2.54541 31.4539C3.74877 32.6573 5.38088 33.3333 7.08268 33.3333H40.916C42.6178 33.3333 44.2499 32.6573 45.4533 31.4539C46.6566 30.2506 47.3327 28.6185 47.3327 26.9167V7.08333C47.3327 5.38153 46.6566 3.74942 45.4533 2.54606C44.2499 1.3427 42.6178 0.666664 40.916 0.666664H7.08268ZM4.16602 26.9167V14.6667H43.8327V26.9167C43.8327 28.5267 42.526 29.8333 40.916 29.8333H7.08268C5.47268 29.8333 4.16602 28.5267 4.16602 26.9167ZM4.16602 11.1667V7.08333C4.16602 5.47333 5.47268 4.16666 7.08268 4.16666H40.916C42.526 4.16666 43.8327 5.47333 43.8327 7.08333V11.1667H4.16602Z"
                                    fill="#C8A98D" />
                            </svg>
                        </div>
                        <div class="rightBlock">
                            <div class="title">{{$page->doptitle2}}</div>
                            <div class="text">
                                <?php $descinhtm = html_entity_decode($page->doptxt2);
                                    echo $descinhtm;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="warning">
                    <?php $descinhtm = html_entity_decode($page->fulldesc);
                        echo $descinhtm;?>
                </div>
            </div>
        </section>
    </main>
@endsection
