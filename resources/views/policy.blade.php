@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
    <link rel="stylesheet" href="/css/policy/styles.css">
@endsection
@section('scripts')
@endsection

@section('title')
    <title>{{$page['title']}}</title>
@endsection
@section('description')
    <meta name="description" content="{{strip_tags($page['description'])}}">
@endsection
@section('keywords')
    <meta name="keywords" content="{{$page['keywords']}}">
@endsection

@section('content')
<main>
  <section class="policy">
    <div class="container">
      <h1>{{$page['h1']}}</h1>
      <div class="policy__text">
        {!!$page['fulldesc']!!}
      </div>
    </div>
  </section>
</main>
@endsection

@section('modal')
    @include('include.modal3uslugi')
@endsection