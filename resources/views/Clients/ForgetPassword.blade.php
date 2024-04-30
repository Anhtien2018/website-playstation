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
                        <h4>Bạn đã quên mật khẩu ?</h4>
                        <p>Hãy nhập số điện thoại và email để lấy lại mật khẩu của mình</p>
                        <a class="primary-btn text-decoration-none " href="{{route('Account.Register')}}">Đăng Ký Tài Khoản</a>
                        <a class="primary-btn text-decoration-none" href="{{route('Account.Login')}}">Đăng Nhập</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                 <h3>Quên Mật Khẩu</h3>
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
                            <input type="text" class="form-control" id="" name="Email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" value="{{old('Email')}}">
                            @error('Email')
                                 <span class="text-danger" >{{$message}}</span>
                             @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            @csrf
                            <button type="submit"  value="submit" class="primary-btn">Lấy lại mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</section>
<!--================End Login Box Area =================-->

