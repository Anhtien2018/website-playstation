@extends('Layouts.Client')
@section('Title')
    {{$Title}}
@endsection
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{asset('assets/Clients/Image/banner-login/login.jpg')}}" alt="">
                    <div class="hover">
                        <h4>Bạn Đã Có Tài Khoản?</h4>
                        <p>Hãy Đăng Nhập Để Được Mua Sắm Những Sản Phẩm Phù Hợp Với Nhu Cầu Và Tài Chính Của Mình!</p>
                        <a class="primary-btn" href="{{route('Account.Login')}}">Đăng Nhập</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Đăng Ký</h3>
                    <form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data" >
                
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="Name" placeholder="Họ Tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Họ Tên'" value="{{old('Name')}}"> 					
                            {{-- Validate form--}}
                            @error('Name')
                            <span class="text-danger" >
                                {{$message}}
                            </span>
                                @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="Phone" placeholder="Số Điện Thoại" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Số Điện Thoại'  " value="{{old('Phone')}}" >
                             {{-- Validate form--}}
                             @error('Phone')
                             <span class="text-danger" >
                                 {{$message}}
                             </span>
                                 @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="Email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" value="{{old('Email')}}" >                            
                             {{-- Validate form--}}
                             @error('Email')
                             <span class="text-danger" >
                                 {{$message}}
                             </span>
                                 @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input onclick="check_password();" style="position: absolute; left:360px; width: 15px;" type="checkbox" id="check">
                            <input type="password" class="form-control" id="password" name="Password" placeholder="Mật Khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật Khẩu'" value="{{old('Password')}}" >
                             {{-- Validate form--}}
                             @error('Password')
                             <span class="text-danger" >
                                 {{$message}}
                             </span>
                                 @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input onclick="check_password_confirm();" style="position: absolute; left:360px; width: 15px;" type="checkbox" id="check_confirm">
                            <input type="password" class="form-control" id="password_confirm" name="Password_confirm" placeholder=" Xác Nhận Mật Khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Xác Nhận Mật Khẩu'" value="{{old('Password_confirm')}}" >
                             {{-- Validate form--}}
                                 @error('Password_confirm')
                             <span class="text-danger" >
                                 {{$message}}
                             </span>
                                 @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            @csrf
                            <button type="submit" value="submit" class="primary-btn">Đăng Ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
