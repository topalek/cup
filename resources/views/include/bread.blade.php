<div class="bread">
  <a href="/" class="bread__link">Главная</a>
  <a class="bread__separator">—</a>
  <a href="/{{$level1url}}" class="bread__link">{{$level1name}}</a>
  <a class="bread__separator">—</a>
  @if($level2url==null)
    <div class="bread__page">{{$level2name}}</div>
  @else
    <a href="/{{$level2url}}" class="bread__link">{{$level2name}}</a>
    <a class="bread__separator">—</a>
    <div class="bread__page">{{$level3name}}</div>
  @endif
</div>