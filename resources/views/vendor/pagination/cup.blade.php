@if ($paginator->hasPages())
    <div class="pagination">

      @if($paginator->currentPage() > 3)
            <a class="pagination__item" href="{{ $paginator->url(1) }}">1</a>
        @endif
        @if($paginator->currentPage() > 4)
            <span>...</span>
        @endif

        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <a class="pagination__item pagination__item--active" aria-current="page">{{ $i }}</a>
                @else
                    <a class="pagination__item" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                @endif
            @endif
        @endforeach

        @if($paginator->currentPage() < $paginator->lastPage() - 3)
            <span>...</span>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <a class="pagination__item" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
        @endif

    </div>
@endif

