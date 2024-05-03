@extends('Layouts.client')
@section('Title')
    {{$Title}}
@endsection
@section('Main')
<div style="margin-top: 140px"  class="container ">
    <div class="row mb-3 mt-3">
        @foreach ($showimage_variantcategory as $showbannerbycate)
        <div class="col-lg-3 col-md-3 mt-2 mb-2">
           <a href=""> <img class="w-100" src="{{asset('assets/Clients/Image/image_variant_category/'.$showbannerbycate->image_by_variant)}}" alt=""></a>
        </div>
        @endforeach
        <div class="mb-2 mt-2 ">
            <h1>{{$id_category[0]->name_variant_category}}</h1>
        </div>
        @foreach ($getimagebannermayps5 as $showbannerps5)
        <div class="col-lg-12 col-md-12"    >
            <img class="w-100" src="{{asset('assets/Clients/Image/banner/'.$showbannerps5->banner_by_variantcategory    )}}" alt="">
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Danh Mục</div>
                <ul class="main-categories">
                    <li class="main-nav-list ">
                    <!-- chạy Vòng Lập Của Hàm Đã Gọi Ở Trên Để Show-->
                       @foreach ($shownamevariantcate as $shownamevariant)    
                       <a class="nav-link active"href="{{route('ProductByCategory',['id'=>$shownamevariant->id_variant_category,'slug'=>Str::slug($shownamevariant->name_variant_category) ])}}">{{$shownamevariant->name_variant_category  }}</span></a>
                       @endforeach
                    </li>						
                </ul>
            </div>
            
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting">
                    <select name="selectnameprice" id="selectnameprice" data-id="{{$id}}" data-selectname="">
                        <option value=""> Chọn</option>
                        <option value="asc">Giá tăng dần</option>
                        <option value="desc">Giá giảm dần</option>
                        <option value="asc">Tên từ A tới Z </option>
                        <option value="desc">Tên từ Z tới A</option>
                    </select>
                </div>
                <div class="sorting mr-auto">
                    <select id="selectlimit" data-id="{{$id}}">
                        <option value="">Hiển thị</option>
                        <option value="1">Hiển thị 5 sản phẩm</option>
                        <option value="10">Hiển thị 10 sản phẩm</option>
                        <option value="20">Hiển thị 20 sản phẩm</option>
                    </select>
                </div>                               
                <div class="pagination">
                {{ $show_list_productbycategory->links('Blocks.Pagination')}}
                </div>
            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pt-3 " >
                    @include('Clients.Product.List_Product_By_Category')
            </section>
            <!-- End Best Seller -->
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center mb-4">
                <div class="sorting mr-auto">
                    <select>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                    </select>
                </div>
                {{-- <div class="pagination">
                {{ $show_list_productbycategory->links('Blocks.Pagination')}}
                </div> --}}
            </div>
            <!-- End Filter Bar -->
        </div>
    </div>
</div>

@endsection