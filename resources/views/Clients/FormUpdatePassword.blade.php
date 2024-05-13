@extends('Layouts.Client')
@section('Title')
    {{$Title}}
@endsection
@section('Main')
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{asset('assets/Clients/Image/banner-login/login.jpg')}}" alt="">
                    <div class="hover">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                 <h3>Cập nhật mật khẩu</h3>
                    <form class="row login_form" action="" method="POST" id="contactForm" novalidate="novalidate">
                        <div class="col-md-12">                
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
                            <button type="submit"  value="submit" class="primary-btn">Cập nhật mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</section>
<!--================End Login Box Area =================-->
@endsection
