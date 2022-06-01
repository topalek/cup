@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
    <link rel="stylesheet" href="/css/faq/styles.css">
@endsection
@section('scripts')
    <script>
        $(document).on("click", ".item", function () {
            $(this).toggleClass("item--active");
        });

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
    @include('include.modal5faq')
@endsection


@section('content')
    <main class="padding">
        <section class="question">
            <div class="container">
                <h1>{{ $page->h1 }}</h1>
                <a class="ask"> Задать вопрос </a>
                <div class="items">
                    @foreach ($questions as $item)
                        <div class="qa item">
                            <div class="top">
                                <div class="text">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 15C6.14348 15 4.36301 14.2625 3.05025 12.9497C1.7375 11.637 1 9.85652 1 8C1 6.14348 1.7375 4.36301 3.05025 3.05025C4.36301 1.7375 6.14348 1 8 1C9.85652 1 11.637 1.7375 12.9497 3.05025C14.2625 4.36301 15 6.14348 15 8C15 9.85652 14.2625 11.637 12.9497 12.9497C11.637 14.2625 9.85652 15 8 15ZM8 16C10.1217 16 12.1566 15.1571 13.6569 13.6569C15.1571 12.1566 16 10.1217 16 8C16 5.87827 15.1571 3.84344 13.6569 2.34315C12.1566 0.842855 10.1217 0 8 0C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8C0 10.1217 0.842855 12.1566 2.34315 13.6569C3.84344 15.1571 5.87827 16 8 16Z"
                                            fill="#E2DAC9" />
                                        <path
                                            d="M5.25412 5.786C5.25275 5.81829 5.258 5.85053 5.26955 5.88072C5.2811 5.91091 5.2987 5.93841 5.32127 5.96155C5.34385 5.98468 5.37091 6.00296 5.40081 6.01524C5.43071 6.02753 5.4628 6.03357 5.49512 6.033H6.32012C6.45812 6.033 6.56812 5.92 6.58612 5.783C6.67612 5.127 7.12612 4.649 7.92812 4.649C8.61412 4.649 9.24212 4.992 9.24212 5.817C9.24212 6.452 8.86812 6.744 8.27712 7.188C7.60412 7.677 7.07112 8.248 7.10912 9.175L7.11212 9.392C7.11317 9.45761 7.13997 9.52017 7.18674 9.5662C7.23351 9.61222 7.2965 9.63801 7.36212 9.638H8.17312C8.23942 9.638 8.30301 9.61166 8.3499 9.56478C8.39678 9.51789 8.42312 9.4543 8.42312 9.388V9.283C8.42312 8.565 8.69612 8.356 9.43312 7.797C10.0421 7.334 10.6771 6.82 10.6771 5.741C10.6771 4.23 9.40112 3.5 8.00412 3.5C6.73712 3.5 5.34912 4.09 5.25412 5.786ZM6.81112 11.549C6.81112 12.082 7.23612 12.476 7.82112 12.476C8.43012 12.476 8.84912 12.082 8.84912 11.549C8.84912 10.997 8.42912 10.609 7.82012 10.609C7.23612 10.609 6.81112 10.997 6.81112 11.549Z"
                                            fill="#E2DAC9" />
                                    </svg>
                                    {{ $item['title'] }}
                                </div>
                                <div class="arrow">
                                    <svg width="19" height="10" viewBox="0 0 19 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.50031 9.66667C9.19851 9.66726 8.90603 9.56215 8.67365 9.36958L0.923649 2.91125C0.659869 2.692 0.493987 2.37695 0.462497 2.0354C0.431006 1.69385 0.536486 1.35378 0.755732 1.09C0.974978 0.82622 1.29003 0.660339 1.63158 0.628848C1.97313 0.597358 2.3132 0.702837 2.57698 0.922083L9.50031 6.70875L16.4236 1.12875C16.5558 1.02146 16.7078 0.941333 16.871 0.892983C17.0342 0.844634 17.2053 0.829013 17.3745 0.847018C17.5438 0.865022 17.7078 0.916297 17.8572 0.997897C18.0065 1.0795 18.1383 1.18981 18.2449 1.3225C18.3632 1.45531 18.4528 1.61112 18.5081 1.78017C18.5633 1.94921 18.5831 2.12785 18.5661 2.30489C18.5491 2.48193 18.4958 2.65356 18.4094 2.80902C18.323 2.96448 18.2054 3.10042 18.0641 3.20833L10.3141 9.44708C10.075 9.60921 9.78849 9.68652 9.50031 9.66667Z"
                                            fill="#C8A98D" />
                                    </svg>
                                </div>
                            </div>
                            <div class="bottom">
                                {{ $item['body'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
