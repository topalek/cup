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
                <img src="/assets/img/personal-area-dekor.png" alt=""/>
            </div>
            <div class="container">
                <h1>{{$page->h1}}</h1>
                <div class="personalArea__wrap">
                    @include('include.menulk',['notices_count'=>$notices->count()])
                    <div class="notifications">
                        @forelse($notices as $notice)
                            <div class="notifications__item @if($notice->img)notifications__item--photo @endif">
                                @if($notice->img)
                                    <div class="notifications__image">
                                        <img src="{{$notice->img}}" alt=""/>
                                    </div>
                                @endif
                                <div class="notifications__wrap">
                                    <div class="notifications__date">{{$notice->created_at->format('d.m.Y H:i')}}</div>
                                    <div class="notifications__title">{{$notice->title}}</div>
                                    <div class="notifications__text">
                                        {!! $notice->content !!}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>У Вас пока нет уведомлений</p>
                        @endforelse
                        {{$notices->links('layouts.parts.pagination')}}
                    </div>
                </div>
            </div>
        </section>
    </main>
    <br>
@endsection
