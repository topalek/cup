@extends('layouts.home')

@section('header', 'header-dark')

@section('styles')
    <link rel="stylesheet" href="/css/portfolio/styles.css">
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
<main class="padding">
    <section class="portfolio">
      <div class="container">
        <h1>{{$page['h1']}}</h1>
        <div class="tabs">

          
          <a href="/portfolio" class="tabs__item {{ Request::is('portfolio') ? 'tabs__item--active' : '' }}">
            Все
          </a>
          @foreach($portfolio as $portfolio_item)
              <?php if($portfolio_item['active']!='0'):?>
              <a href="{{ '/portfolio/'.$portfolio_item['url'] }}" class="tabs__item {{ Request::is('portfolio/'.$portfolio_item['url']) ? 'tabs__item--active' : '' }}">
                {{ $portfolio_item['name'] }}
              </a>
              <?php endif;?>
          @endforeach
        </div>
        <div class="items">
          @foreach($portfolios as $portfolio)
            <?php /*Выборка URL адреса*/
              $item = $portfolio;
              $imageres='';
              $imagalt='';
              $image = $item->attachment()->first();
              $image = $image;
              if ($image!=null):
                $imageres=$image['url'];
                $imagalt=$image['alt'];
              endif;
              $pathcat='';
            ?>
            @foreach($portfolio->categoryelportf as $categoryelportflem)
             <?php $pathcat=$categoryelportflem->url; break;?>
            @endforeach

            <?php if(($portfolio->active)!='0'):?>
              <div class="item">
                <div class="leftBlock">
                  <img src="{{$imageres}}" alt="{{$imagalt}}" />
                </div>
                <div class="rightBlock">
                  <div class="title">{{ $portfolio->name }}</div>
                  <a href="{{ '/portfolio/'.$pathcat.'/'.$portfolio->url }}" class="link">Подробнее</a>
                </div>
              </div>
            <?php endif;?>
          @endforeach
        </div>
        {{ $portfolios->links('vendor.pagination.cup') }}
      </div>
    </section>
  </main>
@endsection