 <!-- single product -->
 @foreach ($list_productGamePS5 as $product_item)
 <div class="col-lg-3 col-md-6">
     <div class="single-product">
         <img class="img-fluid" src="{{asset('assets/Clients/Image/product/'.$product_item->Image_product)}}" alt="">
         <div class="product-details">
             <h6>{{$product_item->Name_product}}</h6>
             <div class="price">
                 <h6 style="font-size: 18px;font-weight: 500" >{{number_format($product_item->Reduced_product)}}<sup class="text-black">đ</sup> </h6>
                 <h6  class="l-through">{{number_format($product_item->Cost_product)}} <sup class="text-black">đ</sup> </h6>
             </div>
             <div class="prd-bottom">    
             <a href="{{route('Cart.addget',$product_item->id)}}" class="social-info">
                     <span class="ti-bag"></span>
                     <p class="hover-text">Mua Ngay</p>
                 </a>
                     
                     @if (Auth::check())
                     {{-- dùng in_array để check tồn tại và trả về true --}}
                         @if (in_array($product_item->id,$favorite))
                         <a onclick="return confirm('Bạn muốn xóa yêu thích sản phẩm')" href="/like/{{$product_item->id}}"   class="social social-info">
                         <span class="fa fa-heart "></span>
                         <p class="hover-text">Bỏ Yêu Thích</p>
                         @else
                         <a href="/like/{{$product_item->id}}"   class="social social-info">
                         <span  class="heart lnr lnr-heart"></span>
                         <p class="hover-text">Yêu Thích</p>
                         @endif
                     @else
                     <a href="/like/{{$product_item->id}}"   class="social social-info">
                     <span  class="heart lnr lnr-heart"></span>
                     <p class="hover-text">Yêu Thích</p>
                     @endif
                    
                 </a>
                 <a href="" class="social-info">
                     <span class="lnr lnr-sync"></span>
                     <p class="hover-text">So Sánh</p>
                 </a>
                 <a href="{{route('view',['id'=>$product_item->id,'slugdetail'=>Str::slug($product_item->Name_product)])}}" class="social-info">
                     <span class="lnr lnr-move"></span>
                     <p class="hover-text">Chi Tiết</p>
                 </a>
             </div>
         </div>
     </div>
 </div>
 <!-- End single product -->
  @endforeach  