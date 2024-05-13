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
                        <h4>Bạn Chưa Có Tài Khoản?</h4>
                        <p>Hãy đăng ký tài khoản để trở làm thành viên của Karma.</p>
                        <a class="primary-btn" href="{{route('Account.Register')}}">Đăng Ký Tài Khoản</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                 <h3>Đăng Nhập</h3>
                    <form class="row login_form" action="" method="POST" id="contactForm" novalidate="novalidate">
                        <div class="col-md-12">                
                        </div>  
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="Phone" placeholder="Số Điện Thoại" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Số Điện Thoại'" value="{{old('Phone')}}">
                             @error('Phone')
                                 <span class="text-danger" >{{$message}}</span>
                             @enderror
                        </div>            
                        <div class="col-md-12 form-group">
                            <input onclick="check_password();" style="position: absolute; left:360px; width: 15px;" type="checkbox" id="check">
                            <input type="password" class="form-control" id="password" name="Password" placeholder="Mật Khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật Khẩu'" value="{{old('Password')}}">
                            @error('Password')
                                 <span class="text-danger" >{{$message}}</span>
                             @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="remember">
                                <label for="f-option2">Ghi Nhớ</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            @csrf
                            <button type="submit"  value="submit" class="primary-btn">Đăng Nhập</button>
                            <a href="{{route('Account.viewreset')}}">Quên Mật Khẩu?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</section>
<!--================End Login Box Area =================-->
@endsection

