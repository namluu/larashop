@if ($paginator->hasPages())
    <span class="mr-1">
        {!! __('Showing') !!}
        <span>{{ $paginator->firstItem() }}</span>
        {!! __('to') !!}
        <span>{{ $paginator->lastItem() }}</span>
        {!! __('of') !!}
        <span>{{ $paginator->total() }}</span>
        {!! __('results') !!}
    </span>

    <ul class="pagination pagination-sm float-right">

        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link">«</a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">«</a></li>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}

            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item disabled"><a class="page-link">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        @if ($paginator->hasMorePages())
             <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">»</a></li>
        @else
             <li class="page-item disabled"><a class="page-link">»</a></li>
        @endif
    </ul>
@endif
