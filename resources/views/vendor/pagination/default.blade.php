@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled page-link bg-primary text-muted rounded-left"><span>Previous</span></li>
        @else
            <li class="page-link bg-primary text-white rounded-left"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="text-white">Previous</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled page-item bg-primary text-white"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active page-item bg-primary text-success"><span>{{ $page }}</span></li>
                    @else
                        <li class="page-link bg-primary text-white"><a href="{{ $url }}" class="text-white">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-link bg-primary text-white rounded-right"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="text-white">Next</a></li>
        @else
            <li class="disabled page-link bg-primary text-muted rounded-right"><span>Next</span></li>
        @endif
    </ul>
@endif