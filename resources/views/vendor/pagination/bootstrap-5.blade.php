@if ($paginator->hasPages())
    <nav>
        <ul class="pagination pagination-sm justify-content-end">
            {{-- First Page Link --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="First">
                    <span aria-hidden="true"><i class="fas fa-angle-double-left fa-sm"></i></span>
                </a>
            </li>

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true"><i class="fas fa-angle-left fa-sm"></i></span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                        <span aria-hidden="true"><i class="fas fa-angle-left fa-sm"></i></span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                        <span aria-hidden="true"><i class="fas fa-angle-right fa-sm"></i></span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true"><i class="fas fa-angle-right fa-sm"></i></span>
                    </a>
                </li>
            @endif

            {{-- Last Page Link --}}
            <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Last">
                    <span aria-hidden="true"><i class="fas fa-angle-double-right fa-sm"></i></span>
                </a>
            </li>
        </ul>
    </nav>
@endif