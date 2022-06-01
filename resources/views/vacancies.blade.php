@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
    <link rel="stylesheet" href="/css/vacancies/styles.css">
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
        <section class="vacancies">
            <div class="container">
                <h1>{{ $page->h1 }}</h1>
                <div class="items">
                    @foreach ($vakancy as $item)
                        <a href="{{'/vakansii/'.$item->url}}" class="item">
                            <div class="leftBlock">
                                <div class="title"> {{ $item['title'] }}</div>
                                <div class="date">{{ $item['published'] }}</div>
                                <div class="char">
                                    <div class="char__item">
                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.35938 0.578949C4.18062 0.578949 3.995 0.640824 3.86438 0.771449C3.73375 0.902074 3.67188 1.0877 3.67188 1.26645V1.6102H0.578125V8.4852H4.42812C4.38344 8.2652 4.35938 8.03489 4.35938 7.7977H1.26562V5.5427C1.46844 5.65957 1.70219 5.7352 1.95312 5.7352H5.05031C5.24281 5.47395 5.47656 5.2402 5.73781 5.0477H1.95312C1.54406 5.0477 1.26562 4.76926 1.26562 4.3602V2.2977H8.82812V4.3602C8.82812 4.4152 8.82469 4.46676 8.81437 4.51489C9.06187 4.59051 9.29562 4.69364 9.51562 4.82082V1.6102H6.42188V1.26645C6.42188 1.0877 6.36 0.902074 6.22938 0.771449C6.09875 0.640824 5.91313 0.578949 5.73438 0.578949H4.35938ZM4.35938 1.26645H5.73438V1.6102H4.35938V1.26645ZM2.64062 3.6727V4.70395H3.32812V3.6727H2.64062ZM6.76562 3.6727V4.51832C6.98947 4.44836 7.21981 4.40115 7.45312 4.37739V3.6727H6.76562ZM7.79688 5.0477C6.28094 5.0477 5.04688 6.28176 5.04688 7.7977C5.04688 9.31364 6.28094 10.5477 7.79688 10.5477C9.31281 10.5477 10.5469 9.31364 10.5469 7.7977C10.5469 6.28176 9.31281 5.0477 7.79688 5.0477ZM7.79688 5.7352C8.93812 5.7352 9.85938 6.65645 9.85938 7.7977C9.85938 8.93895 8.93812 9.8602 7.79688 9.8602C6.65562 9.8602 5.73438 8.93895 5.73438 7.7977C5.73438 6.65645 6.65562 5.7352 7.79688 5.7352ZM7.45312 6.07895V8.14145H9.17188V7.45395H8.14062V6.07895H7.45312Z"
                                                fill="#C8A98D" stroke="#C8A98D" stroke-width="0.4" />
                                        </svg>
                                        {{ $item['experience'] }}
                                    </div>
                                    <div class="char__item">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.6">
                                                <path
                                                    d="M6 1C3.243 1 1 3.243 1 6C1 8.757 3.243 11 6 11C8.757 11 11 8.757 11 6C11 3.243 8.757 1 6 1ZM6 10C3.7945 10 2 8.2055 2 6C2 3.7945 3.7945 2 6 2C8.2055 2 10 3.7945 10 6C10 8.2055 8.2055 10 6 10Z"
                                                    fill="#C8A98D" />
                                                <path d="M6.5 3.5H5.5V6.207L7.1465 7.8535L7.8535 7.1465L6.5 5.793V3.5Z"
                                                    fill="#C8A98D" />
                                            </g>
                                        </svg>

                                        {{ $item['workload_short'] }}
                                    </div>
                                    <div class="char__item">
                                        <svg width="8" height="10" viewBox="0 0 8 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4 4.99999C3.45 4.99999 3 4.54999 3 3.99999C3 3.44999 3.45 2.99999 4 2.99999C4.55 2.99999 5 3.44999 5 3.99999C5 4.54999 4.55 4.99999 4 4.99999ZM7 4.09999C7 2.28499 5.675 0.999993 4 0.999993C2.325 0.999993 1 2.28499 1 4.09999C1 5.26999 1.975 6.81999 4 8.67C6.025 6.81999 7 5.26999 7 4.09999ZM4 -7.62939e-06C6.1 -7.62939e-06 8 1.60999 8 4.09999C8 5.75999 6.665 7.725 4 10C1.335 7.725 0 5.75999 0 4.09999C0 1.60999 1.9 -7.62939e-06 4 -7.62939e-06Z"
                                                fill="#C8A98D" />
                                        </svg>

                                        {{ $item['city'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="rightBlock">
                                <svg width="48" height="16" viewBox="0 0 48 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M47.7071 8.70711C48.0976 8.31659 48.0976 7.68342 47.7071 7.2929L41.3431 0.928936C40.9526 0.538411 40.3195 0.538411 39.9289 0.928936C39.5384 1.31946 39.5384 1.95262 39.9289 2.34315L45.5858 8L39.9289 13.6569C39.5384 14.0474 39.5384 14.6805 39.9289 15.0711C40.3195 15.4616 40.9526 15.4616 41.3431 15.0711L47.7071 8.70711ZM-8.74228e-08 9L47 9L47 7L8.74228e-08 7L-8.74228e-08 9Z"
                                        fill="#C8A98D" />
                                </svg>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </section>
    </main>
@endsection
