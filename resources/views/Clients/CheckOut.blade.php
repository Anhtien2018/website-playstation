@extends('Layouts.Client')
@section('Title')
    {{$Title}}
@endsection
@section('Main')
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
  @livewire('check-out')
@endsection
 

<!--================End Checkout Area =================-->
