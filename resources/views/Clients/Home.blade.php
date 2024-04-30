@extends('Layouts.Client')
@section('Title')
    {{$Title}}
@endsection
@section('Slider')
    @include('Sliders.SliderHome')
@endsection
@section('Contact')
    @include('Contacts.ContactHome')
@endsection
@section('Main')
<!-- single product slide -->
<div class="single-product-slider mb-3">
    <div class="container">
   <a href="{{route('ProductByCategory',['id'=>$list_productPS5[0]->id_variant_category,'slug'=>Str::slug($list_productPS5[0]->name_variant_category) ])}}"> <img class="w-100" style="border-radius: 15px" src="{{asset('assets/Clients/Image/banner/ps5vuottroi.jpg')}}" alt=""></a>
    {{-- end single slide --}}
    {{-- box product --}}
 <div class="d-flex justify-content-between align-items-center p-2">
    <span  ><a class="text-start" style="color: #146678; font-size: 30px; padding: 10px 10px; font-family: Arial, Helvetica, sans-serif; font-weight: 600" href="{{route('ProductByCategory',['id'=>$list_productPS5[0]->id_variant_category,'slug'=>Str::slug($list_productPS5[0]->name_variant_category) ])}}"> <i class="fa fa-angle-down" ></i>{{$list_productPS5[0]->name_variant_category}}</a></span>
 </div>
        <div class="row" id="resultpr">
           @include('Clients.Product.List_ProductPS5_Home')
            </div>
            {{-- end box --}}
        <div class="pagination d-flex justify-content-end">
            {{$list_productPS5->links('Blocks.Pagination')}}
        </div>
    </div>
   
</div>
<!-- single product slide -->
    {{-- End boxproduct --}}
    <!-- single product slide -->
<div class="single-product-slider">
    <div class="container">
   <a class="single-slide" href="{{route('ProductByCategory',['id'=>$list_productGamePS5    [0]->id_variant_category,'slug'=>Str::slug($list_productGamePS5 [0]->name_variant_category) ])}}"> <img class="w-100" style="border-radius: 15px" src="{{asset('assets/Clients/Image/banner/gameps5.webp')}}" alt=""></a>
    {{-- end single slide --}}
    {{-- box product --}}
    <style>
       
    </style>
 <div class="d-flex justify-content-between align-items-center p-2">
    <span  ><a class="text-start" style="color: #146678; font-size: 30px; padding: 10px 10px; font-family: Arial, Helvetica, sans-serif; font-weight: 600" href="{{route('ProductByCategory',['id'=>$list_productGamePS5    [0]->id_variant_category,'slug'=>Str::slug($list_productGamePS5 [0]->name_variant_category) ])}}"> <i class="fa fa-angle-down" ></i>{{$list_productGamePS5   [0]->name_variant_category}}</a></span>
 </div>
        <div class="row" id="resultpr">
           @include('Clients.Product.List_ProductGamePS5_Home')
            </div>
            {{-- end box --}}
        <div class="pagination d-flex justify-content-end">
            {{$list_productGamePS5->links('Blocks.Pagination')}}
        </div>
    </div>
   
</div>
<!-- single product slide -->
    {{-- End boxproduct --}}
    
@endsection
<script src="{{asset('assets/Clients/js/ajax/home.js')}}"></script>
