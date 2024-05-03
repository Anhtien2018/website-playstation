<div class="row" id="productbycategoryresult">
@foreach ($show_list_productbycategory as $product)
<!-- single product -->
<div style="width: 300px;"  class="col-lg-4 col-md-6">
<div class="single-product">
 <img class="img_product_category" style="" class="img-fluid" src="{{asset('assets/Clients/Image/product/'.$product->Image_product)}}" alt="">
 <div class="product-details">
     <h6>{{$product->Name_product}}</h6>
     <div class="price">
         <h6>{{number_format($product->Reduced_product)}}.vnđ</h6>
         <h6 class="l-through">{{number_format($product->Cost_product)}}.vnđ</h6>
     </div>
     <div class="prd-bottom">
         <a href="{{route('Cart.addget',$product->id)}}" class="social-info">
             <span class="ti-bag"></span>
             <p class="hover-text">Mua Ngay</p>
         </a>
         @if (Auth::check())
         {{-- dùng in_array để check tồn tại và trả về true --}}
             @if (in_array($product->id,$favorite))
             <a onclick="return confirm('Bạn muốn xóa yêu thích sản phẩm')" href="/like/{{$product->id}}"   class="social social-info">
             <span class="fa fa-heart "></span>
             <p class="hover-text">Bỏ Yêu Thích</p>
             @else
             <a href="/like/{{$product->id}}"   class="social social-info">
             <span  class="heart lnr lnr-heart"></span>
             <p class="hover-text">Yêu Thích</p>
             @endif
         @else
         <a href="/like/{{$product->id}}"   class="social social-info">
         <span  class="heart lnr lnr-heart"></span>
         <p class="hover-text">Yêu Thích</p>
         @endif 
         </a>
         <a href="" class="social-info">
             <span class="lnr lnr-sync"></span>
             <p class="hover-text">So Sánh</p>
         </a>
         <a href="{{route('view',['id'=>$product->id,'slugdetail'=>Str::slug($product->Name_product)])}}" class="social-info">
             <span class="lnr lnr-move"></span>
             <p class="hover-text">Chi Tiết</p>
         </a>
     </div>
 </div>
</div>
</div>
<!-- End single product -->
@endforeach
</div>   