<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;
use App\Models\ProductByCategory;
class ProductByCategoryController extends Controller
{
    protected $product_bycate;
    protected $category;
    public function __construct(){
        $this->product_bycate=new ProductByCategory;
        $this->category=new Categories;
    }
    public function ProductByCategory($id, Request $request){
        $Title='Karma';
        // lấy id
        $this->product_bycate->id=$id;
        // show sản phẩm theo id 
        $show_list_productbycategory=$this->product_bycate->GetProductByCategory();
        if($request->ajax()){
        return view('Clients/ProductByCategory',compact('show_list_productbycategory'))->render();
        }
       
        // lấy id từ id sản phẩm
        $id_category=$this->product_bycate->getnamevariantcate($show_list_productbycategory[0]->id_variant_category);
        // show danh mục variant
        $shownamevariantcate=$this->product_bycate->showvariantcategory($id_category[0]->id_category);
        // show 4 image
        $showimage_variantcategory=$this->product_bycate->showbanner_bycate($show_list_productbycategory[0]->id_variant_category);
        // show banner
        $getimagebannermayps5=$this->product_bycate->get_banner_mayps5($show_list_productbycategory[0]->id_variant_category);
       return view('Clients/ProductByCategory',compact('Title','show_list_productbycategory','shownamevariantcate','id','id_category','showimage_variantcategory','getimagebannermayps5'));
    }
    
    public function filter_productbycategory(Request $request){
        $selectnameprice=$request->selectnameprice;
        $selectlimit=$request->selectlimit;
        $this->product_bycate->id=$request->id;
        if($selectnameprice=="" && $selectlimit==""){
            $show_list_productbycategory=$this->product_bycate->GetProductByCategory();
        }else if($selectnameprice=="pricedesc" && $selectlimit==""){
            $this->product_bycate->selectnameprice="desc";
            $show_list_productbycategory=$this->product_bycate->FilterPriceProductByCategory();
        }else if($selectnameprice=="priceasc" && $selectlimit==""){
            $this->product_bycate->selectnameprice="asc";
            $show_list_productbycategory=$this->product_bycate->FilterPriceProductByCategory();
        }else if($selectnameprice=="namedesc" && $selectlimit==""){
            $this->product_bycate->selectnameprice="desc";
            $show_list_productbycategory=$this->product_bycate->FilterNameProductByCategory();
        }else if($selectnameprice=="nameasc" && $selectlimit==""){
            $this->product_bycate->selectnameprice="asc";
            $show_list_productbycategory=$this->product_bycate->FilterNameProductByCategory();
        }else if($selectnameprice=="pricedesc" && $selectlimit!=""){
            $this->product_bycate->selectnameprice="desc";
            $this->product_bycate->selectlimit=$selectlimit;
            $show_list_productbycategory=$this->product_bycate->FilterPriceLimitProductByCategory();
        }else if($selectnameprice=="priceasc" && $selectlimit!=""){
            $this->product_bycate->selectnameprice="asc";
            $this->product_bycate->selectlimit=$selectlimit;
            $show_list_productbycategory=$this->product_bycate->FilterPriceLimitProductByCategory();
        }
        else if($selectnameprice=="namedesc" && $selectlimit!=""){
            $this->product_bycate->selectnameprice="desc";
            $this->product_bycate->selectlimit=$selectlimit;
            $show_list_productbycategory=$this->product_bycate->FilterNameLimitProductByCategory();
        }
        else if($selectnameprice=="nameasc" && $selectlimit!=""){
            $this->product_bycate->selectnameprice="asc";
            $this->product_bycate->selectlimit=$selectlimit;
            $show_list_productbycategory=$this->product_bycate->FilterNameLimitProductByCategory();
        }
       $out='';
       foreach ($show_list_productbycategory as $product) {
       $out.='
       <!-- single product -->
       <div style="width: 300px;"  class="col-lg-4 col-md-6">
           <div class="single-product">
               <img class="img_product_category" style="" class="img-fluid" src="/assets/Clients/Image/product/'.$product->Image_product.'" alt="">
               <div class="product-details">
                   <h6>'.$product->Name_product.'</h6>
                   <div class="price">
                       <h6>'.number_format($product->Reduced_product).'vnđ</h6>
                       <h6 class="l-through">'.number_format($product->Cost_product).'vnđ</h6>
                   </div>
                   <div class="prd-bottom">
                       <a href="" class="social-info">
                           <span class="ti-bag"></span>
                           <p class="hover-text">Mua Ngay</p>
                       </a>
                       <a href="" class="social-info">
                           <span class="lnr lnr-heart"></span>
                           <p class="hover-text">Yêu Thích</p>
                       </a>
                       <a href="" class="social-info">
                           <span class="lnr lnr-sync"></span>
                           <p class="hover-text">So Sánh</p>
                       </a>
                       <a href="" class="social-info">
                           <span class="lnr lnr-move"></span>
                           <p class="hover-text">Chi Tiết</p>
                       </a>
                   </div>
               </div>
           </div>
       </div>
       <!-- End single product -->
       ';
       }
       return $out;
    }
    
}
