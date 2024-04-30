@extends('Layouts.Client')
@section('Title')
    {{$Title}}
@endsection
<form action="{{route('Cart.addpost',$product_detail->id)}}" method="post">
    @csrf
<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{asset('assets/Clients/Image/product/'.$product_detail['Image_product'])}}" alt="">
                    </div> 
                 
                    @foreach ($image_detail as $show_image)
                    <div class="single-prd-item">
                        <img class="img-fluid " src="{{asset('assets/Clients/Image/product/'.$show_image->image)}}" alt="">
                    </div>
                    @endforeach
                </div>
                @foreach ($banner_detail as $showbannerdetail)
                <a href=""><img class="mb-2"  src="{{asset('assets/Clients/Image/image_detail/'.$showbannerdetail->image_detail)}}" alt=""></a>
                @endforeach
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{$product_detail['Name_product']}}</h3>
                    <li>Nhà sản xuất: {{$product_detail['Producer']}} </li>
                    <li class="mb-1" >Model:{{$product_detail['Model_product']}} </li>
                    <div class="d-flex ">
                        <h2 class="me-2" >{{ number_format ($product_detail['Reduced_product'])}}đ</h2>
                        <del class="text-black " ><h6 class="text-black m-0" >{{ number_format ($product_detail['Cost_product'])}}đ</h6></del>
                    </div>
                    <div style=" border: 1px solid black " class="box col-auto">
                        <div class="infor-block">
                            @foreach ($policy as $name_content_policy => $showpolicy)
                            <div style="font-size: 18px; font-weight: 600"  class="infor-title"> <i class="{{$showpolicy[0]->icon_name_content}}"></i> {{$name_content_policy}}</div>
                           
                            <div class="infor-content">
                                @foreach ($showpolicy as $shownamepolicy)
                                <li>{{$shownamepolicy->name_policy}}</li>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                   </div>
                   
                    <div class="product_count mt-3  ">
                        <label for="qty">Số Lượng:</label>
                        <input type="text" name="quantity" id="quandetail" min="1"  value="1" title="Quantity:" class="input-text qty">
                       
                        <button onclick="highdetail()" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                        <button onclick="lowdetail()"  class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                    </div>
                    <div class="card_area d-flex align-items-center">
                        <button type="submit" class="primary-btn mb-3 w-100" >Mua Ngay </button>
                    </div>
                    <div style="background: #ECF4FB" class="box col-auto mb-3">
                        <div class="infor-block">
                            @foreach ($product_include as $name_content_detail => $show)
                            <div style="font-size: 18px; font-weight: 600"  class="infor-title">{{$name_content_detail}}</div>
                            @endforeach

                            <div class="infor-content">
                                
                                @foreach ($show as $shownameinclude)
                                <li>{{$shownameinclude->name_include}}</li>
                                @endforeach
                               
                            </div>
                        </div>
                   </div>
                   <div class="infordetail col-auto " style="border: 1px solid black">
                    @foreach ($detail1 as $shownamedetail => $showinforproduct)
                    <div style="background: #ECF4FB; " class="title">
                        <strong style="font-size: 22px">{{$shownamedetail}}</strong>
                    </div>
                 @foreach ($showinforproduct as $showinfo)
                    <div class="content">
                            <li>{{$showinfo->name_information}} : {{$showinfo->value_information}}</li>
                                            </div>
                    @endforeach
                    @endforeach
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
</form>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sản phẩm cùng loại</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                 aria-selected="false">Thông Tin Chi Tiết</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                 aria-selected="false">Bình Luận</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                 aria-selected="false">Giới Thiệu</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  {{-- box product --}}
<!-- single product slide -->
<div class="single-product-slider">
    <div class="container"> 
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">     
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single product -->
                @foreach ($showprdetailbycate as $product_item)
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
            </div>
        </div>
    </div>
    {{-- End boxproduct --}}
            </div>
            {{-- end sp cùng loại --}}
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="col-lg-12 col-md-12">
                    @foreach ($information as $showinformation)
                    <h2 style="color: #146678" >{{$showinformation->name_detail_information}}</h2>
                    <p>{{$showinformation->value_detail_information}}</p>
                    @if (!$showinformation->image_detail_information)
                    @else
                    <div class="d-flex justify-content-center">
                        <img class="w-75"  src="{{asset('assets/Clients/Image/detail_information/'.$showinformation->image_detail_information)}}" alt="">
                     </div>
                    @endif
                    @endforeach
                </div>
            </div>
            {{-- end profile --}}
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo</p>
                            </div>
                            <div class="review_item reply">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-2.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo</p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-3.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Post a comment</h4>
                            <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->


<script src="{{asset('assets/Clients/js/customer/detail.js')}}"></script>