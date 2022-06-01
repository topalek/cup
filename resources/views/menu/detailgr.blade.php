@extends('layouts.home')
@section('header', 'header-dark')
@section('styles')
    <link rel="stylesheet" href="/css/menu/section/detail/styles.css">
@endsection

@section('content')
    <main>
        <section class="description">
            <div class="container">
              @include('include.bread')
                <h1 class="description__title">
                    Готовое решение для детей до 8 лет
                </h1>
                <div class="description__inner">
                    <div class="description__item description__box">
                        <div class="swiper-container description__mySwiper2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide swiper-slide__big">
                                    <div class="description__image-big">
                                        <img src="/assets/img/descriptbg.png" />
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide__big">
                                    <div class="description__image-big">
                                        <img src="/assets/img/descriptbg.png" />
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide__big">
                                    <div class="description__image-big">
                                        <img src="/assets/img/descriptbg.png" />
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide__big">
                                    <div class="description__image-big">
                                        <img src="/assets/img/descriptbg.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper-container description__mySwiper">
                            <div class="swiper-wrapper description__wp-small">
                                <div class="swiper-slide">
                                    <div class="description__image-small">
                                        <img src="/assets/img/descriptbg.png" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="description__image-small">
                                        <img src="/assets/img/descriptbg.png" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="description__image-small">
                                        <img src="/assets/img/descriptbg.png" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="description__image-small">
                                        <img src="/assets/img/descriptbg.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="description__item description__info">
                        <div class="tags">
                            <div class="tag">Фуршет</div>
                        </div>
                        <p class="description__info-text">
                            Сервировка стола необычная, стиль оформления
                            подбирается под мероприятие, нет повторяющихся
                            оформлений. Индивидуальный декор - всегда
                            красиво, как с картинки.
                        </p>
                        <div class="tooltip__items">
                            <div class="tooltip__item">
                                <div class="tooltip__item-image">
                                    <img class="tooltip__item-img" src="/assets/img/fossil3.svg" alt="" />
                                </div>
                                <div class="tooltip__item-tooltip">
                                    Подходит при палеодиете
                                </div>
                            </div>
                            <div class="tooltip__item">
                                <div class="tooltip__item-image">
                                    <img class="tooltip__item-img" src="/assets/img/veganbig.svg" alt="" />
                                </div>
                                <div class="tooltip__item-tooltip">
                                    Подходит при палеодиете
                                </div>
                            </div>
                            <div class="tooltip__item">
                                <div class="tooltip__item-image">
                                    <img class="tooltip__item-img" src="/assets/img/vegetarian1.svg" alt="" />
                                </div>
                                <div class="tooltip__item-tooltip">
                                    Подходит при палеодиете
                                </div>
                            </div>
                            <div class="tooltip__item">
                                <div class="tooltip__item-image">
                                    <img class="tooltip__item-img" src="/assets/img/glutenfree1.svg" alt="" />
                                </div>
                                <div class="tooltip__item-tooltip">
                                    Подходит при палеодиете
                                </div>
                            </div>
                        </div>
                        <div class="description__price">18 000 р.</div>
                        <div class="description__wieght">12 010 г.</div>
                        <div class="description__other">
                            <button class="description__other-btn">
                                в корзину
                            </button>
                            <a class="
                                description__other-link
                                link--arrow-brown
                            "
                                href="#">В 1 клик</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="composition">
            <div class="container">
                <div class="composition__title">
                    Состав готового решения
                </div>
                <div class="tabs">
                    <div class="tabs-item tabs-item--active" data-id="1">
                        Холодные закуски
                    </div>
                    <div class="tabs-item" data-id="2">Десерты</div>
                    <div class="tabs-item" data-id="3">Горячие закуски</div>
                    <div class="tabs-item" data-id="4">
                        Посуда и оборудование
                    </div>
                </div>
                <div class="bottom">
                    <div class="composition-item composition-item--active" data-id="1">
                        <div class="leftBlock">
                            <div class="item">
                                <div class="left">
                                    1. Ролл из опалённого на ольхе лосося с
                                    пряным сыром
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    2. Тигровые креветки в соусе манго с
                                    маракуйей
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    3. Томлёный ростбиф с травами в соусе
                                    вителло тонатой
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    4. Вяленый томат с сыром Рикотта.
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    5. Тартар из тунца с клубникой и
                                    сегментом апельсина
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    6. Тыквенный мусс на кокосовом молоке с
                                    копчёной уткой
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    7. Сырное плато (дорблю, пармезан,
                                    чедер, камамбер) с фруктами,
                                    сыровялеными деликатесами, ягодами и
                                    медом — 250 гр.
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rightBlock">
                            <div class="image">
                                <img src="/assets/img/composition-image.png" alt="" />
                            </div>
                            <div class="textBlock">
                                <div class="textBlock__title">Состав:</div>
                                <div class="textBlock__text">
                                    Семга слабосоленная, сливочный сыр, хрен
                                    сливочный, укроп
                                </div>
                            </div>
                            <a href="#" class="add-cart">в корзину</a>
                        </div>
                    </div>
                    <div class="composition-item" data-id="2">
                        <div class="leftBlock">
                            <div class="item">
                                <div class="left">
                                    1. Ролл из опалённого на ольхе лосося с
                                    пряным сыром222
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    2. Тигровые креветки в соусе манго с
                                    маракуйей222
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    3. Томлёный ростбиф с травами в соусе
                                    вителло тонатой222
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    4. Вяленый томат с сыром Рикотта.222
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    5. Тартар из тунца с клубникой и
                                    сегментом апельсина222
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    6. Тыквенный мусс на кокосовом молоке с
                                    копчёной уткой222
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    7. Сырное плато (дорблю, пармезан,
                                    чедер, камамбер) с фруктами,
                                    сыровялеными деликатесами, ягодами и
                                    медом — 250 гр.222
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rightBlock">
                            <div class="image">
                                <img src="/assets/img/composition-image.png" alt="" />
                            </div>
                            <div class="textBlock">
                                <div class="textBlock__title">Состав:</div>
                                <div class="textBlock__text">
                                    Семга слабосоленная, сливочный сыр, хрен
                                    сливочный, укроп
                                </div>
                            </div>
                            <a href="#" class="add-cart">в корзину</a>
                        </div>
                    </div>
                    <div class="composition-item" data-id="3">
                        <div class="leftBlock">
                            <div class="item">
                                <div class="left">
                                    1. Ролл из опалённого на ольхе лосося с
                                    пряным сыром333
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    2. Тигровые креветки в соусе манго с
                                    маракуйей333
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    3. Томлёный ростбиф с травами в соусе
                                    вителло тонатой333
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    4. Вяленый томат с сыром Рикотта.333
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    5. Тартар из тунца с клубникой и
                                    сегментом апельсина333
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    6. Тыквенный мусс на кокосовом молоке с
                                    копчёной уткой333
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    7. Сырное плато (дорблю, пармезан,
                                    чедер, камамбер) с фруктами,
                                    сыровялеными деликатесами, ягодами и
                                    медом — 250 гр.333
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rightBlock">
                            <div class="image">
                                <img src="/assets/img/composition-image.png" alt="" />
                            </div>
                            <div class="textBlock">
                                <div class="textBlock__title">Состав:</div>
                                <div class="textBlock__text">
                                    Семга слабосоленная, сливочный сыр, хрен
                                    сливочный, укроп
                                </div>
                            </div>
                            <a href="#" class="add-cart">в корзину</a>
                        </div>
                    </div>
                    <div class="composition-item" data-id="4">
                        <div class="leftBlock">
                            <div class="item">
                                <div class="left">
                                    1. Ролл из опалённого на ольхе лосося с
                                    пряным сыром444
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    2. Тигровые креветки в соусе манго с
                                    маракуйей444
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    3. Томлёный ростбиф с травами в соусе
                                    вителло тонатой444
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    4. Вяленый томат с сыром Рикотта.444
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    5. Тартар из тунца с клубникой и
                                    сегментом апельсина444
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    6. Тыквенный мусс на кокосовом молоке с
                                    копчёной уткой444
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    7. Сырное плато (дорблю, пармезан,
                                    чедер, камамбер) с фруктами,
                                    сыровялеными деликатесами, ягодами и
                                    медом — 250 гр.444
                                </div>
                                <div class="right">
                                    <div class="select">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="delete">
                                        <svg width="17" height="21" viewBox="0 0 17 21" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rightBlock">
                            <div class="image">
                                <img src="/assets/img/composition-image.png" alt="" />
                            </div>
                            <div class="textBlock">
                                <div class="textBlock__title">Состав:</div>
                                <div class="textBlock__text">
                                    Семга слабосоленная, сливочный сыр, хрен
                                    сливочный, укроп
                                </div>
                            </div>
                            <a href="#" class="add-cart">в корзину</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ready wesee">
            <div class="container container--relative">
                <h2 class="ready__title">Вы смотрели</h2>
                <div class="swiper-container wesee__wp">
                    <div class="swiper-wrapper">
                      <?php $fl=false?>
                      @if($prosmotrprod!=null)
                      @foreach($prosmotrprod as $productspopel)
                        <?php /*Выборка URL адреса*/
                          $item2 = $productspopel;
                          $imageresor='';
                          $imagalt='';
                          $image = $item2->attachment()->first();
                          if ($image!=null):
                            $imageresor=$image['url'];
                            $imagalt=$image['alt'];
                          endif;
                          $pathcat='';
                        ?>
                        @foreach($productspopel->categoryel as $categoryelem)
                          <?php $pathcat=$categoryelem->url; break;?>
                        @endforeach
  
                        <div class="swiper-slide <?php if ($fl==false):?>swiper-slide--flex<?php endif;?>">
                          <div class="ready__item">
                            <div class="ready__image <?php if ($fl==false):?>ready__image--minsize<?php else:?>ready__image--bigsize<?php endif;?>">
                              <a href="{{ '/menu/'.$pathcat.'/'.$productspopel->url }}">
                                <img
                                  class="ready__img"
                                  src="{{$imageresor}}"
                                  alt="{{$imagalt}}"
                                />
                              </a>
                            </div>
                            <div class="ready-category">
                              <div class="ready-category__items">
                                  @if($productspopel->tooltip1)
                                    <div class="ready-category__item">
                                        <div class="ready-category__item-image">
                                            <img class="tooltip__item-img"  src="/assets/img/fossil3.svg" alt=""/>
                                        </div>
                                        <div class="ready-category__item-tooltip">
                                            {{ __('product.tooltip_1') }}
                                        </div>
                                    </div>
                                  @endif
                                  @if($productspopel->tooltip2)
                                    <div class="ready-category__item">
                                        <div class="ready-category__item-image">
                                            <img class="tooltip__item-img" src="/assets/img/veganbig.svg" alt=""/>
                                        </div>
                                        <div class="ready-category__item-tooltip">
                                            {{ __('product.tooltip_2') }}
                                        </div>
                                    </div>
                                  @endif
                                  @if($productspopel->tooltip3)
                                    <div class="ready-category__item">
                                        <div class="ready-category__item-image">
                                            <img class="tooltip__item-img" src="/assets/img/vegetarian1.svg" alt=""/>
                                        </div>
                                        <div class="ready-category__item-tooltip">
                                            {{ __('product.tooltip_3') }}
                                        </div>
                                    </div>
                                  @endif
                                  @if($productspopel->tooltip4)
                                    <div class="ready-category__item">
                                        <div class="ready-category__item-image">
                                            <img class="tooltip__item-img" src="/assets/img/glutenfree1.svg" alt=""/>
                                        </div>
                                        <div class="ready-category__item-tooltip">
                                            {{ __('product.tooltip_4') }}
                                        </div>
                                    </div>
                                  @endif
                              </div>
                              <div class="tag">Фуршет</div>
                            </div>
                            <div class="ready__person">{{$productspopel->name}}</div>
                            <div class="ready__total">
                              <div class="ready__total-price">{{$productspopel->price_full}} руб.</div>
                              <div class="ready__total-weight">{{$productspopel->weight_full}} г. </div>
                            </div>
                            <div class="ready__buttons">
                              <button class="ready__buttons-basket">в корзину</button>
                              <a class="ready__buttons-link link--arrow-brown" href="#">В 1 клик</a>
                            </div>
                          </div>
                        </div>
                        
                        <?php if ($fl):$fl=false;else:$fl=true;endif;?>
                      @endforeach
                      @endif
                      <?php $fl=false?>
                      @if($prosmotrgotresh!=null)
                      @foreach($prosmotrgotresh as $productspopel)
                        <?php /*Выборка URL адреса*/
                          $item2 = $productspopel;
                          $imageresor='';
                          $imagalt='';
                          $image = $item2->attachment()->first();
                          if ($image!=null):
                            $imageresor=$image['url'];
                            $imagalt=$image['alt'];
                          endif;
                          $pathcat='';
                        ?>
                        @foreach($productspopel->cataloggrel as $categoryelem)
                          <?php $pathcat=$categoryelem->url; break;?>
                        @endforeach
  
                        <div class="swiper-slide <?php if ($fl==false):?>swiper-slide--flex<?php endif;?>">
                          <div class="ready__item">
                            <div class="ready__image <?php if ($fl==false):?>ready__image--minsize<?php else:?>ready__image--bigsize<?php endif;?>">
                              <a href="{{ '/menu/'.$pathcat.'/'.$productspopel->url }}">
                                <img
                                  class="ready__img"
                                  src="{{$imageresor}}"
                                  alt="{{$imagalt}}"
                                />
                              </a>
                            </div>
                            <div class="ready-category">
                              <div class="ready-category__items">
                                  @if($productspopel->tooltip1)
                                    <div class="ready-category__item">
                                        <div class="ready-category__item-image">
                                            <img class="tooltip__item-img"  src="/assets/img/fossil3.svg" alt=""/>
                                        </div>
                                        <div class="ready-category__item-tooltip">
                                            {{ __('product.tooltip_1') }}
                                        </div>
                                    </div>
                                  @endif
                                  @if($productspopel->tooltip2)
                                    <div class="ready-category__item">
                                        <div class="ready-category__item-image">
                                            <img class="tooltip__item-img" src="/assets/img/veganbig.svg" alt=""/>
                                        </div>
                                        <div class="ready-category__item-tooltip">
                                            {{ __('product.tooltip_2') }}
                                        </div>
                                    </div>
                                  @endif
                                  @if($productspopel->tooltip3)
                                    <div class="ready-category__item">
                                        <div class="ready-category__item-image">
                                            <img class="tooltip__item-img" src="/assets/img/vegetarian1.svg" alt=""/>
                                        </div>
                                        <div class="ready-category__item-tooltip">
                                            {{ __('product.tooltip_3') }}
                                        </div>
                                    </div>
                                  @endif
                                  @if($productspopel->tooltip4)
                                    <div class="ready-category__item">
                                        <div class="ready-category__item-image">
                                            <img class="tooltip__item-img" src="/assets/img/glutenfree1.svg" alt=""/>
                                        </div>
                                        <div class="ready-category__item-tooltip">
                                            {{ __('product.tooltip_4') }}
                                        </div>
                                    </div>
                                  @endif
                              </div>
                              <div class="tag">Фуршет</div>
                            </div>
                            <div class="ready__person">{{$productspopel->name}}</div>
                            <div class="ready__total">
                              <div class="ready__total-price">{{$productspopel->price_full}} руб.</div>
                              <div class="ready__total-weight">{{$productspopel->weight_full}} г. </div>
                            </div>
                            <div class="ready__buttons">
                              <button class="ready__buttons-basket">в корзину</button>
                              <a class="ready__buttons-link link--arrow-brown" href="#">В 1 клик</a>
                            </div>
                          </div>
                        </div>
                        
                        <?php if ($fl):$fl=false;else:$fl=true;endif;?>
                      @endforeach
                      @endif
                    </div>
                    <!--div class="swiper-pagination wesee__pagination default"></div-->
                </div>
                <div class="swiper-button-prev wesee__button-prev">
                    <svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.469669 6.53033C0.176777 6.23744 0.176777 5.76257 0.469669 5.46967L5.24264 0.696701C5.53553 0.403808 6.01041 0.403808 6.3033 0.696701C6.59619 0.989595 6.59619 1.46447 6.3033 1.75736L2.06066 6L6.3033 10.2426C6.59619 10.5355 6.59619 11.0104 6.3033 11.3033C6.01041 11.5962 5.53553 11.5962 5.24264 11.3033L0.469669 6.53033ZM29 6.75L1 6.75L1 5.25L29 5.25L29 6.75Z"
                            fill="#C8A98D" />
                    </svg>
                </div>
                <div class="swiper-button-next wesee__button-next">
                    <svg width="29" height="12" viewBox="0 0 29 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M28.5303 6.53033C28.8232 6.23744 28.8232 5.76257 28.5303 5.46967L23.7574 0.696701C23.4645 0.403808 22.9896 0.403808 22.6967 0.696701C22.4038 0.989595 22.4038 1.46447 22.6967 1.75736L26.9393 6L22.6967 10.2426C22.4038 10.5355 22.4038 11.0104 22.6967 11.3033C22.9896 11.5962 23.4645 11.5962 23.7574 11.3033L28.5303 6.53033ZM-6.55671e-08 6.75L28 6.75L28 5.25L6.55671e-08 5.25L-6.55671e-08 6.75Z"
                            fill="#C8A98D" />
                    </svg>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
@endsection
