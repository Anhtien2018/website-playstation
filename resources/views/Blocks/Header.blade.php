<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light main_box">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="/"><img src="{{asset('assets/Clients/Image/logo/logo.png')}}" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
              <li class="nav-item "><a class="nav-link" href="/">Trang Chủ</a></li>
              {{-- Lấy name cate --}}
                @foreach ($list_category as $showNamecate => $show)
                <li  class="nav-item submenu dropdown">
                  <a  href="#" class="nav-link dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false"> <img style="width: 20px;" src="{{asset('assets/Clients/Image/icons/'.$show[0]->Icon_category)}}" alt=""> {{$showNamecate}}</a>
                <ul class="dropdown-menu">
                  {{-- lặp 2 --}}
                   @foreach ($show as $category)
                  <li class="nav-item"><a class="nav-link" href="{{route('ProductByCategory',['id'=>$category->id_variant_category,'slug'=>Str::slug($category->name_variant_category) ])}}">{{$category->name_variant_category}}</a></li>
                  @endforeach  
                </ul>
              </li>
                @endforeach
              <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false"> @if(Auth::check()){{Auth::user()->name}}
                       @else
                       Tài Khoản
                   @endif </a>
                <ul class="dropdown-menu">
                    {{--  check logined --}}
                  @if (Auth::check())
                  {{-- check permission user logined --}}
                  @if (Auth::user()->permission==1)
                  <li class="nav-item"><a class="nav-link" href="{{{route('Account.Logout')}}}">Quản lí</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{{route('Account.Profile')}}}">Trang thông tin</a></li>
                  <li class="nav-item"><a class="nav-link" onclick="return confirm('Bạn có muốn đăng xuất')" href="{{{route('Account.Logout')}}}">Đăng xuất</a></li>
                  @else
                  <li class="nav-item"><a class="nav-link" href="{{{route('Account.Profile')}}}">Trang thông tin</a></li>
                  <li class="nav-item"><a class="nav-link"  onclick="return confirm('Bạn có muốn đăng xuất')" href="{{{route('Account.Logout')}}}">Đăng xuất</a></li>
                  @endif
                  @else
                  <li class="nav-item"><a class="nav-link" href="{{route('Account.Register')}}">Đăng ký</a></li>
                  <li class="nav-item"><a class="nav-link"   href="{{route('Account.Login')}}">Đăng Nhập</a></li> 
                  @endif
                </ul >
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              
              <li class="nav-item position-relative "  >
                @if (count($cart)==0)
                @else
                <p style="height: 5px; margin-top: 10px; margin-left: 3px " class="position-absolute mt-10" >{{count($cart)}}</p>
                @endif
                <a href="{{route('Cart.view')}}" class=""><span class="ti-bag"></span></a>
                
              </li>
              <li class="nav-item">
                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="search_input " id="search_input_box">
      <div class="container">
        <form action="" class="d-flex justify-content-between m-0">
          @csrf
          <input type="text" name="word" class="form-control" id="search_input" placeholder="Tìm Kiếm">
          <button type="submit" class="btn"></button>
          <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
        </form>
        <div  class="result_search  d-flex justify-content-center">
            <div  class="w-100 bg-white box_product_search  ">
           <a href="">
            <div class="product_search d-flex align-items-center justify-content-center justify-content-evenly " >
              <div class="image_product_search me-2">
                <img style="width: 60px; border-radius: 50%" src="{{asset('assets/Clients/Image/product/ps5digital.jpg')}}" alt="">
              </div>
              <div class="name_product_search me-2">
                <span><strong class="text-black">Máy PS5 Slim Standard Edition + Dualsense White - Chính Hãng</strong></span>
              </div>
              <div class="price_product_search">
                <span class="me-1"><strong class="text-black">15,000,000</strong></span>
                <span><del class="text-black" style="font-size: 14px">25,000,000</del></span>
              </div>
             </div>
           </a>
             
            </div>
        </div>
        
      </div> 
      
  </div>
   
  </header>
  <!-- End Header Area -->
  <script src="{{asset('assets/Clients/js/ajax/search_product.js')}}"></script>