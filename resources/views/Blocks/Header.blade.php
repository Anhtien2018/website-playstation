<!-- Start Header Area -->
<header class="header_area sticky-header" >
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
              <li class="nav-item p-0">
                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
              </li>
              <li class="nav-item p-0">
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="search"><span class="lnr lnr-envelope" id="search"></span></button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="search_input " id="search_input_box">
      <div class="container">
        @livewire('Live-Search_Product')
      </div> 
      
  </div>
   
  </header>
  <!-- End Header Area -->
<script src="{{asset('assets/Clients/js/ajax/home.js')}}"></script>
{{-- modal chat --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body p-0">
        @if (Auth::check())
        @livewire('Chat-App')
        @else
        <span>Vui lòng đăng nhập để có thể trò chuyện với shop !</span>
        <span><a  href="{{route('Account.Login')}}">Đăng Nhập</a></span>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
{{-- end modal chat --}}
