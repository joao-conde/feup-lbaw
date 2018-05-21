@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled page-link bg-primary text-muted rounded-left"><span>@lang('pagination.previous')</span></li>
        @else
            <li class="page-link bg-primary text-white rounded-left"><a href="{{ $paginator->previousPageUrl() }}" class="text-white" rel="prev">@lang('pagination.previous')</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-link bg-primary text-white rounded-right"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="text-white">@lang('pagination.next')</a></li>
        @else
            <li class="disabled page-link bg-primary text-muted rounded-right"><span>@lang('pagination.next')</span></li>
        @endif
    </ul>
@endif
