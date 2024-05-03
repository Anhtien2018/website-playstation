@extends('Layouts.Client')
@section('Title')
    {{$Title}}
@endsection
    <!-- single product slide -->
    <div class="single-product-slider" style="margin-top: 140px">
        <div class="container">
     <div class="d-flex justify-content-between align-items-center p-2">
        {{-- <span  ><a class="text-start" style="color: #146678; font-size: 30px; padding: 10px 10px; font-family: Arial, Helvetica, sans-serif; font-weight: 600" href="{{route('ProductByCategory',['id'=>$list_productGamePS5    [0]->id_variant_category,'slug'=>Str::slug($list_productGamePS5 [0]->name_variant_category) ])}}"> <i class="fa fa-angle-down" ></i>{{$list_productGamePS5   [0]->name_variant_category}}</a></span> --}}
     </div>
    <form action="{{route('search')}}">
        <div class="mb-3 col-auto">
            <label for="">Từ khóa tìm kiếm: {{$word}}  </label><br>
            <label for="">Tìm Thấy: {{count($list_product_search)}} kết quả </label>
            <input type="text" name="word" class="form-control" id="exampleFormControlInput1" placeholder="Tìm Kiếm">
          </div>
    </form>
    <div class="col-xl-12 col-lg-12 col-md-10">
        <!-- Start Filter Bar -->
        <div class="filter-bar d-flex flex-wrap align-items-center">
            <div class="sorting">
                <select name="selectnamepricesearch" id="selectnamepricesearch" data-word="{{$word}}" data-selectname="">
                    <option value=""> Chọn</option>
                    <option value="asc">Giá tăng dần</option>
                    <option value="desc">Giá giảm dần</option>
                    <option value="asc">Tên từ A tới Z </option>
                    <option value="desc">Tên từ Z tới A</option>
                </select>
            </div>
            <div class="sorting mr-auto">
                <select id="selectlimitsearch" data-word="{{$word}}">
                    <option value="">Hiển thị</option>
                    <option value="1">Hiển thị 5 sản phẩm</option>
                    <option value="10">Hiển thị 10 sản phẩm</option>
                    <option value="20">Hiển thị 20 sản phẩm</option>
                </select>
            </div>
            <div class="pagination">
            {{ $list_product_search->appends(request()->input())->links('Blocks.Pagination')}}
            </div>
        </div>
     <div class="row mt-3" id="resultpr"> 
        @include('Clients.Product.List_Search_Product')       
        </div>
    </div>
        </div>
    <!-- single product slide -->
        {{-- End boxproduct --}}
       
