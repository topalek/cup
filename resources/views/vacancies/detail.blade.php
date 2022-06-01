@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
    <link rel="stylesheet" href="/css/vacancies/detail/styles.css">
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

@section('modal')
    @include('include.modal6vak')
@endsection

@section('scripts')
    <script>
       let fields = document.querySelectorAll(".field__file");
        Array.prototype.forEach.call(fields, function (input) {
        let label = input.nextElementSibling,
            labelVal = label.querySelector(".field__file-fake").innerText;

        input.addEventListener("change", function (e) {
            let countFiles = "";
            if (this.files && this.files.length >= 1) countFiles = this.files.length;

            if (countFiles)
            label.querySelector(".field__file-fake").innerText =
                "Выбрано файлов: " + countFiles;
            else label.querySelector(".field__file-fake").innerText = labelVal;
        });
        });
    </script>
@endsection


@section('content')
    <main class="padding">
        <section class="vacanciesDetail">
            <div class="container">
                <div class="top">
                    <div class="leftBlock">
                        @include('include.bread')
                        <h1>{{ $page->title }}</h1>
                        <div class="char">
                            <div class="char__item">
                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.35938 0.578949C4.18062 0.578949 3.995 0.640824 3.86438 0.771449C3.73375 0.902074 3.67188 1.0877 3.67188 1.26645V1.6102H0.578125V8.4852H4.42812C4.38344 8.2652 4.35938 8.03489 4.35938 7.7977H1.26562V5.5427C1.46844 5.65957 1.70219 5.7352 1.95312 5.7352H5.05031C5.24281 5.47395 5.47656 5.2402 5.73781 5.0477H1.95312C1.54406 5.0477 1.26562 4.76926 1.26562 4.3602V2.2977H8.82812V4.3602C8.82812 4.4152 8.82469 4.46676 8.81437 4.51489C9.06187 4.59051 9.29562 4.69364 9.51562 4.82082V1.6102H6.42188V1.26645C6.42188 1.0877 6.36 0.902074 6.22938 0.771449C6.09875 0.640824 5.91313 0.578949 5.73438 0.578949H4.35938ZM4.35938 1.26645H5.73438V1.6102H4.35938V1.26645ZM2.64062 3.6727V4.70395H3.32812V3.6727H2.64062ZM6.76562 3.6727V4.51832C6.98947 4.44836 7.21981 4.40115 7.45312 4.37739V3.6727H6.76562ZM7.79688 5.0477C6.28094 5.0477 5.04688 6.28176 5.04688 7.7977C5.04688 9.31364 6.28094 10.5477 7.79688 10.5477C9.31281 10.5477 10.5469 9.31364 10.5469 7.7977C10.5469 6.28176 9.31281 5.0477 7.79688 5.0477ZM7.79688 5.7352C8.93812 5.7352 9.85938 6.65645 9.85938 7.7977C9.85938 8.93895 8.93812 9.8602 7.79688 9.8602C6.65562 9.8602 5.73438 8.93895 5.73438 7.7977C5.73438 6.65645 6.65562 5.7352 7.79688 5.7352ZM7.45312 6.07895V8.14145H9.17188V7.45395H8.14062V6.07895H7.45312Z"
                                        fill="#C8A98D" stroke="#C8A98D" stroke-width="0.2" />
                                </svg>
                                {{ $page->experience }}
                            </div>
                            <div class="char__item">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 1C3.243 1 1 3.243 1 6C1 8.757 3.243 11 6 11C8.757 11 11 8.757 11 6C11 3.243 8.757 1 6 1ZM6 10C3.7945 10 2 8.2055 2 6C2 3.7945 3.7945 2 6 2C8.2055 2 10 3.7945 10 6C10 8.2055 8.2055 10 6 10Z"
                                        fill="#C8A98D" />
                                    <path d="M6.5 3.5H5.5V6.207L7.1465 7.8535L7.8535 7.1465L6.5 5.793V3.5Z"
                                        fill="#C8A98D" />
                                </svg>

                                {{ $page->workload_short }}
                            </div>
                            <div class="char__item">
                                <svg width="8" height="10" viewBox="0 0 8 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4 5C3.45 5 3 4.55 3 4C3 3.45 3.45 3 4 3C4.55 3 5 3.45 5 4C5 4.55 4.55 5 4 5ZM7 4.1C7 2.285 5.675 1 4 1C2.325 1 1 2.285 1 4.1C1 5.27 1.975 6.82 4 8.67C6.025 6.82 7 5.27 7 4.1ZM4 0C6.1 0 8 1.61 8 4.1C8 5.76 6.665 7.725 4 10C1.335 7.725 0 5.76 0 4.1C0 1.61 1.9 0 4 0Z"
                                        fill="#C8A98D" />
                                </svg>

                                {{ $page->city }}
                            </div>
                        </div>
                    </div>
                    <div class="rightBlock">
                        <div class="salary">
                            от&nbsp;<span>{{ $page->salary_format }}</span>&nbsp;руб/мес
                        </div>
                        <a class="respond"> откликнуться </a>
                    </div>
                </div>
                <div class="requirements">
                    <div class="item">
                        <span>Требуемый опыт работы:</span> {{ $page->experience }}
                    </div>
                    <div class="item">
                        <span>{{ $page->workload_full }}</span>
                    </div>
                    <div class="item"><span>Обязанности:</span></div>
                    <div class="item">
                        {!! $page->responsibility !!}
                    </div>
                    <div class="item"><span>Требования:</span></div>
                    <div class="item">
                        {!! $page->requirements !!}
                    </div>
                    <div class="item"><span>Условия:</span></div>
                    <div class="item">
                        {!! $page->conditions !!}
                    </div>
                </div>
                <div class="date">Вакансия опубликована {{ $page->published }}</div>
            </div>
        </section>
    </main>
@endsection
