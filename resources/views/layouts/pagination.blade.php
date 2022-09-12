

<!-- Pagination -->

@if ($paginator->hasPages())
    <div class="rounded-lg bg-white px-4 py-3 mt-10 site-drop-shadow  inline-flex flex-row space-x-4">
       
        @if ($paginator->onFirstPage())
            <span style="width:37px;height:37px;" class="flex justify-center items-center rounded-lg font-medium ">
                <i class="fa fa-chevron-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" style="width:37px;height:37px;" class="flex justify-center items-center rounded-lg font-medium hover:bg-neutral-100 text-neutral-400">
                <i class="fa fa-chevron-left"></i>
            </a>
        @endif
      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <span disabled class="flex justify-center items-center">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" style="width:37px;height:37px;" class="flex justify-center items-center rounded-lg font-medium bg-sky-200 text-sky-500">{{ $page }}</a>
                    @else
                    <a href="{{ $url }}" style="width:37px;height:37px;" class="flex justify-center items-center rounded-lg font-medium hover:bg-neutral-100 text-neutral-500">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" style="width:37px;height:37px;" class="flex justify-center items-center rounded-lg font-medium hover:bg-neutral-100 text-neutral-400">
                <i class="fa fa-chevron-right"></i>
            </a>
        @else
        <span style="width:37px;height:37px;" class="flex justify-center items-center rounded-lg font-medium">
            <i class="fa fa-chevron-right"></i>
        </span>
        @endif
    </div>
    
    
@endif 
