
@if ($paginator->hasPages())
    <ul class="pager d-flex pagination justify-content-center mt-5">
       
        @if ($paginator->onFirstPage())
            <li class="disabled page-item p-2"><span>← Previous</span></li>
        @else
            <li class="page-item p-2"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled page-item p-2"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active page-item p-2"><span>{{ $page }}</span></li>
                    @else
                        <li class="page-item p-2"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li class="page-item p-2"><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled page-item p-2"><span>Next →</span></li>
        @endif
    </ul>
@endif 