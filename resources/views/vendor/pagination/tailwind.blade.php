@if ($paginator->hasPages())
    @php
        $current = $paginator->currentPage();
        $last = $paginator->lastPage();
        $range = [$current - 1, $current, $current + 1];
    @endphp
    <div class="flex items-center justify-center md:justify-between mt-3 md:mt-0 p-0 md:p-6">
        <span class="text-base-content/80 hidden text-sm md:inline">
            {!! __('Showing') !!}
            @if ($paginator->firstItem())
                <span class="font-semibold">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="font-semibold">{{ $paginator->lastItem() }}</span>
            @else
                {{ $paginator->count() }}
            @endif
            {!! __('of') !!}
            <span class="font-semibold">{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </span>
        
        <div class="inline-flex items-center gap-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span aria-disabled="true" class="btn btn-circle sm:btn-sm btn-xs btn-ghost cursor-not-allowed" aria-label="{{ __('pagination.previous') }}">
                    <span class="iconify lucide--chevron-left"></span>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-circle sm:btn-sm btn-xs btn-ghost" aria-label="{{ __('pagination.previous') }}">
                    <span class="iconify lucide--chevron-left"></span>
                </a>    
            @endif

            {{-- First Page --}}
            @if ($current > 2)
                <a href="{{ $paginator->url(1) }}" class="btn btn-ghost btn-circle sm:btn-sm btn-xs" aria-label="{{ __('Go to page :page', ['page' => 1]) }}">1</a>
                @if ($current > 3)
                    <span class="btn btn-ghost btn-circle sm:btn-sm btn-xs" aria-disabled="true">...</span>
                @endif
            @endif

            {{-- Pages Around Current --}}
            @foreach (range(max(1, $current - 1), min($last, $current + 1)) as $page)
                @if ($page == $current)
                    <span class="btn btn-primary btn-circle sm:btn-sm btn-xs" aria-current="page">{{ $page }}</span>
                @else
                    <a href="{{ $paginator->url($page) }}" class="btn btn-ghost btn-circle sm:btn-sm btn-xs" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Last Page --}}
            @if ($current < $last - 1)
                @if ($current < $last - 2)
                    <span class="btn btn-ghost btn-circle sm:btn-sm btn-xs" aria-disabled="true">...</span>
                @endif
                <a href="{{ $paginator->url($last) }}" class="btn btn-ghost btn-circle sm:btn-sm btn-xs" aria-label="{{ __('Go to page :page', ['page' => $last]) }}">{{ $last }}</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-circle sm:btn-sm btn-xs btn-ghost" aria-label="{{ __('pagination.next') }}">
                    <span class="iconify lucide--chevron-right"></span>
                </a>
            @else
                <span class="btn btn-circle sm:btn-sm btn-xs btn-ghost cursor-not-allowed" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span class="iconify lucide--chevron-right"></span>
                </span>
            @endif
        </div>
    </div>
@endif
