@if ($paginator->hasPages())
    @if (!$paginator->onFirstPage())
    <a  href="{{ $paginator->previousPageUrl() }}" class="prev-arrow d-flex align-items-center justify-content-center"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
    @endif
    
    @foreach ($elements as $element)
    @foreach ($element as $page =>$url)
    @if ($page == $paginator->currentPage())
    <a href="{{$url}}" class="active">{{$page}}</a>
        @else
    <a href="{{$url}}" class="">{{$page}}</a>
    @endif
    @endforeach
    @endforeach

   @if ($paginator->hasMorePages())
    <a  href="{{ $paginator->nextPageUrl() }}" class="next-arrow d-flex align-items-center justify-content-center"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
   @endif
@endif
<script src="{{asset('assets/Clients/js/ajax/pagination.js')}}"></script>
    
