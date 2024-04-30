<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Auth;
class ProductDetailController extends Controller
{
    protected $detail;
    protected $product;
    public function __construct(){
        $this->detail=new ProductDetail;
        $this->product=new Product;
    }
    public function productdetail(Request $request, $id){
        $Title='Chi tiết sản phẩm';
        $product_detail=$this->detail::find($request->id);
        // dùng group by để nhóm name_content detail lại
        $detail1=$this->detail->detail($id)->groupBy('name_content_detail');  
        // Update view product   
        $this->detail->updateview($id);
        // show image by product 
        $image_detail=$this->detail->getimagedetail($id);
        // show banner image detail
        $banner_detail=$this->detail->getbannerdetail($id);
        // show information product
        $information=$this->detail->getinformationdetail($id);
        // dd($information);
        // show product include
        $product_include=$this->detail->getproductinclude($id);
        // show policy product 
        $policy=$this->detail->getpolicy();
        // get product by id product 
        $get_cate=$this->detail->getcategory_product($id);
        // show product by category detail  
        $showprdetailbycate=$this->detail->show_product_by_category($get_cate[0]->id_variant_category);
       
        return view('Clients.ProductDetail', compact('Title','product_detail','detail1','image_detail','banner_detail','product_include','policy','showprdetailbycate','information'));
    }
   
}
                            