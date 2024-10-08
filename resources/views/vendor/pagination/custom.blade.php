@if ($paginator->hasPages())
    <ul class="pagination">
       
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">
                    {{-- ← Sebelumnya --}}
                    <i class="fas fa-arrow-left" ></i>
                </span>
            </li>
        @else
            <li>
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" style="color:#3E6BB3;">
                    {{-- ← Sebelumnya --}}
                    <i class="fas fa-arrow-left" ></i>
                </a>
            </li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="page-item disabled">
                    <span class="page-link">
                        {{ $element }}
                    </span>
                </li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active my-active">
                            <span class="page-link" style="background-color:#3E6BB3;border-color: #3E6BB3;">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}" style="color:#3E6BB3;">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" style="color:#3E6BB3;">
                    {{-- Selanjutnya → --}}
                    <i class="fas fa-arrow-right"></i>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">
                    {{-- Selanjutnya → --}}
                    <i class="fas fa-arrow-right"></i>
                </span>
            </li>
        @endif
    </ul>
@endif 