@extends('Layouts.Client')
@section('Title')
    {{$Title}}
@endsection
 <!-- Start Banner Area -->
 <section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Checkout</h1>
                <nav class="d-flex align-items-center">
                    <a href="/">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">checkout</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
  <!--================Checkout Area =================-->
  <section class="checkout_area section_gap">
    <div class="container">
      
        <div class="cupon_area">
            <div class="check_title">
                <h2>Nhập vocher giảm giá tại đây !</h2>
            </div>
            <input type="text" placeholder="Vocher Giảm Giá">
            <a class="tp_btn" href="#">Sử Dụng</a>
        </div>
        <div class="billing_details " >
            <div class="row" >
                <div class="col-lg-8">
                    <h3>Thông Tin Chi Tiết</h3>
                    <form class="row " action="#" method="post" novalidate="novalidate">
                        <div class="col-md-6 form-group p_star">
                            <label for="">Họ Và Tên</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Vui lòng nhập họ tên">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">Số Điện Thoại</label>
                            <input type="text" class="form-control" id="last" name="name" placeholder="Vui lòng nhập số điện thoại">
                        </div>  
                        <div class="col-md-12 form-group">
                            <span>Email</span>
                            <input type="text" class="form-control" id="company" name="company" placeholder="Vui lòng nhập email">
                        </div>
                        <div class="col-md-6 form-group ">
                            <label for="">Thành phố</label>
                            <select class="country_select w-100" id="selectprovince" >
                                    <option class="w-100" value="">Chọn</option>
                                    @foreach ($province as $item)
                                    <option value="{{$item->matp}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-md-6 form-group ">
                            <label for="resultdt">Quận huyện</label>
                            <select id="resultdt" class="district_select w-100 show" >
                                    <option value="">Chọn</option>   
                            </select>
                        </div>
                        <div class="col-md-6 form-group ">
                            <label for="">Phường xã</label>
                            <select  class="ward_select w-100" id="ward">
                                    <option class="w-100" value="">Chọn</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group ">
                            <label for="">Số nhà</label>
                            <input type="text" class="form-control" id="last" name="name" placeholder="Vui lòng nhập số nhà">
                        </div>
                        
                        
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="selector">
                                <label for="f-option2">Create an account?</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <h3>Shipping Details</h3>
                                <input type="checkbox" id="f-option3" name="selector">
                                <label for="f-option3">Ship to a different address?</label>
                            </div>
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Đơn Hàng Của Bạn</h2>
                        <ul class="list">
                            <li class="d-flex justify-content-between" ><span>Tên sản phẩm</span><span>Số lượng</span><span>Tổng tiền</span></li>
                            @foreach ($cart as $showcart)
                            <li><a class="d-flex justify-content-between " href="{{route('view',['id'=>$showcart['id_product'],'slugdetail'=>Str::slug($showcart['Name'])])}}"> <span class="w-25">{{$showcart['Name']}}</span> <span class="middle me-4 ">x {{$showcart['quantity']}}</span> <span class="last">{{number_format($showcart['Reduced'] * $showcart['quantity'])}}<sup class="text-black">đ</sup></span></a></li>
                            <hr>
                            @endforeach
                           
                            
                        </ul>
                        <ul class="list list_2">
                            <li class="d-flex justify-content-between"><strong>Thành tiền:</strong><span>{{number_format($total_price)}}<sup class="text-black">đ</sup></span></li>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector">
                                <label for="f-option5">Check payments</label>
                                <div class="check"></div>
                            </div>
                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                Store Postcode.</p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector">
                                <label for="f-option6">Paypal </label>
                                <img src="img/product/card.jpg" alt="">
                                <div class="check"></div>
                            </div>
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                account.</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector">
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                        <a class="primary-btn" href="#">Proceed to Paypal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>
<!--================End Checkout Area =================-->