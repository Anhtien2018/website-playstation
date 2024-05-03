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
        // show sản phẩm theo id 
        $show_list_productbycategory=$this->product_bycate->GetProductByCategory($id);
        if($request->ajax()){
            $show_list_productbycategory=Product::all();
            return view('Clients.Product.List_Product_By_Category',compact('show_list_productbycategory'))->render();
        }
        // lấy id từ id sản phẩm
        $id_category=$this->product_bycate->getnamevariantcate($show_list_productbycategory[0]->id_variant_category);
        // show danh mục variant
        $shownamevariantcate=$this->product_bycate->showvariantcategory($id_category[0]->id_category);
        // show 4 image
        $showimage_variantcategory=$this->product_bycate->showbanner_bycate($show_list_productbycategory[0]->id_variant_category);
        // show banner
        $getimagebannermayps5=$this->product_bycate->get_banner_mayps5($show_list_productbycategory[0]->id_variant_category);
       return view('Clients.ProductByCategory',compact('Title','show_list_productbycategory','shownamevariantcate','id','id_category','showimage_variantcategory','getimagebannermayps5'));
    }
    
    public function filter_productbycategory(Request $request){
        $selectnameprice=$request->selectnameprice;
        $selectlimit=$request->selectlimit;
        $id=$request->id;
        if($request->ajax()){
            // $show_list_productbycategory=$this->product_bycate->GetProductByCategoryfilter($id);
            if($selectnameprice=="" && $selectlimit==""){
                $show_list_productbycategory=$this->product_bycate->GetProductByCategory($id); 
                return view('Clients.Product.List_Product_By_Category',compact('show_list_productbycategory'))->render();
            }else if($selectnameprice!=="" && $selectlimit=="" ){
                $show_list_productbycategory=$this->product_bycate->GetProductByCategoryfilterorderby($id,$selectnameprice); 
                return view('Clients.Product.List_Product_By_Category',compact('show_list_productbycategory'))->render();
            }else if($selectlimit!=="" && $selectnameprice==""){
                $show_list_productbycategory=$this->product_bycate->GetProductByCategoryfilterpagination($id,$selectlimit); 
                return view('Clients.Product.List_Product_By_Category',compact('show_list_productbycategory'))->render();
            }else if($selectnameprice!=="" && $selectlimit!==""){
                $show_list_productbycategory=$this->product_bycate->GetProductByCategoryfilterall($id,$selectlimit,$selectnameprice); 
                return view('Clients.Product.List_Product_By_Category',compact('show_list_productbycategory'))->render();  
            }
        }
    
    }
    
}
