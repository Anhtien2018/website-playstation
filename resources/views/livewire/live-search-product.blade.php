<div>
    <form action="{{route('search')}}" class="d-flex justify-content-between m-0">
        @csrf
        <input type="text" wire:model.live="keySearch" name="word" class="form-control" id="search_input" placeholder="Tìm Kiếm">
        <button type="submit" class="btn"></button>
        <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
      </form>
      <div id="hide"  class="  d-flex justify-content-center">
        <div class="w-100  result_search  bg-white box_product_search  ">
            @if ($list_product_search && $list_product_search->count() >0)
            @foreach ($list_product_search as $showsearch)
            <a href="{{route('view',['id'=>$showsearch->id,'slugdetail'=>Str::slug($showsearch->Name_product)])}}">
                <div class="product_search d-flex align-items-center justify-content-center justify-content-evenly " >
                  <div class="image_product_search me-2">
                    <img style="width: 60px; border-radius: 50%" src="{{asset('assets/Clients/Image/product/'.$showsearch->Image_product)}}" alt="">
                  </div>
                  <div class="name_product_search me-2">
                    <span><strong class="text-black">{{$showsearch->Name_product}}</strong></span>
                  </div>
                  <div class="price_product_search">  
                    <span class="me-1"><strong class="text-black">{{$showsearch->Reduced_product}}</strong></span>
                    <span><del class="text-black" style="font-size: 14px">{{$showsearch->Cost_product}}</del></span>
                  </div>
                 </div>
               </a>
            @endforeach            
            @endif
        </div>
      </div>
     
      

    </div>






  
   
</div>
