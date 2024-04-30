@extends('Layouts.Client')
@section('Title')
    {{$Title}}
@endsection
 <!-- Start Banner Area -->
 <section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Giỏ Hàng</h1>
                <nav class="d-flex align-items-center">
                    <a href="/">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Giỏ hàng</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<!--================Cart Area =================-->
@if (count($cart)==0)
<div class="d-flex justify-content-center">
<img class="w-25 " src="{{asset('assets/Clients/Image/banner/no-buy.png')}}" alt="">
    </div> 
       @else
<section class="cart_area">
    <div class="container">
        <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">Stt</th>
                <th scope="col">Hình</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành Tiền</th>
                <th scope="col">Hành Động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item =>$show)
                <tr>
                    <th scope="row">{{$index++}}</th>
                    <td  ><img style="width: 100px;" src="{{asset('assets/Clients/Image/product/'.$show['Image'])}}" alt=""></td>
                    <td>{{$show['Name']}}</td>
                    <td>{{number_format($show['Reduced'])}}<sup class="text-black">đ</sup></td>
                    <td><input class="w-25" type="text" min="1" name="" onblur="writequantity({{$show['id_product']}})"  id="quantity"  value="{{$show['quantity']}}" >
                        <button onclick="changequantityhight({{$show['id_product']}})" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                        <button onclick="changequantitylow({{$show['id_product']}})"  class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                    </td>
                    
                    <td>{{number_format($show['quantity']*$show['Reduced'])}}<sup class="text-black">đ</sup></td>
                    <td ><button class="btn btn-danger btndelete"  onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')" data-id="{{$show['id_product']}}" >Xóa<i class="fa fa-trash" ></i></button></td>
                  </tr>
                @endforeach
                  <tr>
                    <td>Tổng Tiền: {{number_format($total_price)}}<sup class="text-black" >đ</sup> </td> 
                  </tr>
            </tbody>
          </table>
    </div>
</section>
@endif

<!--================End Cart Area =================-->
{{-- <td>
    <div class="cupon_text d-flex align-items-center">
        <input type="text" placeholder="Coupon Code">
        <a class="primary-btn" href="#">Apply</a>
    </div>
</td> --}}
{{-- <td>
    <a class="gray_btn" href="#">Update Cart</a>
</td> --}}

