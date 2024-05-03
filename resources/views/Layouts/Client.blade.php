<!DOCTYPE html>

<html lang="zxx" class="no-js">
    <head>
    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{asset('assets/Clients/Image/logo/fav.png')}}">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
    
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    
   <link rel="stylesheet" href="{{asset('assets/Clients/css/linearicons.css')}}">
   <link rel="stylesheet" href="{{asset('assets/Clients/css/font-awesome.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/Clients/css/themify-icons.css')}}">
   <link rel="stylesheet" href="{{asset('assets/Clients/css/bootstrap.css')}}">
   <link rel="stylesheet" href="{{asset('assets/Clients/css/owl.carousel.css')}}">
   <link rel="stylesheet" href="{{asset('assets/Clients/css/nice-select.css')}}">
   <link rel="stylesheet" href="{{asset('assets/Clients/css/nouislider.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/Clients/css/ion.rangeSlider.css')}}">
   <link rel="stylesheet" href="{{asset('assets/Clients/css/ion.rangeSlider.skinFlat.css')}}">
   <link rel="stylesheet" href="{{asset('assets/Clients/css/magnific-popup.css')}}">
   <link rel="stylesheet" href="{{asset('assets/Clients/css/main.css')}}">
   <link rel="stylesheet" href="{{asset('assets/Clients/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/Clients/css/customer/style.css')}}">
   
 
   
    <title>@yield('Title')</title>
</head>
   
     {{-- Header --}}
    
<body>
  @include('Blocks.Header')
   <main>
     {{-- Main --}}
    {{-- Slider --}}
    @yield('Slider')
    {{-- Contact --}}
    @yield('Contact')
    @yield('Main')
   </main>
    {{-- Footer --}}
    @include('Blocks.Footer')s
    
</body>

    <script src="{{asset('assets/Clients/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
    <script src="{{asset('assets/Clients/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/Clients/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/Clients/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/Clients/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('assets/Clients/js/nouislider.min.js')}}"></script>
    <script src="{{asset('assets/Clients/js/countdown.js')}}"></script>
    <script src="{{asset('assets/Clients/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/Clients/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/Clients/js/owl.carousel.min.js')}}"></script>
    <!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{asset('assets/Clients/js/gmaps.min.js')}}"></script>
    <script src="{{asset('assets/Clients/js/main.js')}}"></script>
    {{-- ajax --}}
    <script src="{{asset('assets/Clients/js/ajax/search_product.js')}}"></script>
    <script src="{{asset('assets/Clients/js/ajax/category.js')}}"></script>
    <script src="{{asset('assets/Clients/js/ajax/productbycategory.js')}}"></script>
    <script src="{{asset('assets/Clients/js/ajax/cart.js')}}"></script>
    <script src="{{asset('assets/Clients/js/ajax/checkout.js')}}"></script>
</html>
