@if ($paginator->hasPages())
    <div style="display:flex;gap:8px;justify-content:center;margin-top:24px">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span style="padding:8px 12px;color:#9ca3af">Prev</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               style="padding:8px 12px;background:#e5e7eb;border-radius:6px;text-decoration:none">
                Prev
            </a>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span style="padding:8px 12px">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span style="padding:8px 12px;background:#4f46e5;color:white;border-radius:6px">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                           style="padding:8px 12px;background:#e5e7eb;border-radius:6px;text-decoration:none">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               style="padding:8px 12px;background:#e5e7eb;border-radius:6px;text-decoration:none">
                Next
            </a>
        @else
            <span style="padding:8px 12px;color:#9ca3af">Next</span>
        @endif
    </div>
@endif
