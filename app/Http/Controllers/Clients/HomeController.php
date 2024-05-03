<?php

namespace App\Http\Controllers\Clients;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Banner;
use App\Models\test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    protected $product;
    protected $banner;
    public function __construct(){
        $this->product= new Product;
        $this->banner=new Banner;
    }
    public function index(Product $product, Request $request){
        $Title='Trang Chủ';
        // // Show All Category on Menu
        $list_productPS5=$this->product->GetProductPs5();
        $list_productGamePS5=$this->product->GetProductGamePS5();
        // showw banner home
        // banner left
        $bannerleft=$this->banner->showbnleft();
        // banner right
        $bannerright=$this->banner->showbnright();
        // banner slide
        $slide=$this->banner->showslide();
        // banner bottom
        $bannerbottom=$this->banner->showbnbottom();
        return view('Clients.Home',compact('Title','list_productPS5','list_productGamePS5','bannerleft','bannerright','slide','bannerbottom'));
    }
    // search live ajax
    public function search_product(Request $request){
            $word=$request->word;
            $show12=$this->product->search_product($word);
            return response()->json($show12);                      
    }
    // search by word 
    public function Auth_search_product(Request $request){
        $Title="Tìm Kiếm";
        // Lấy word
        $word=$request->word;
        // Gọi hàm
        $list_product_search=$this->product->Authsearch_product($word);   
        // Lưu trữ biến word
        $list_product_search->appends(['word'=>$word]);
        // Nếu có ajax
        if($request->ajax()){
            // lấy dữ liệu
            $word=$request->word;
            $selectnamepricesearch=$request->selectnamepricesearch;
            $selectlimitsearch=$request->selectlimitsearch;
            // xét điều kiện
            if($selectnamepricesearch=="" && $selectlimitsearch==""){
                return view('Clients.Product.List_Search_Product',compact('list_product_search'));
            }else if($selectnamepricesearch!=="" && $selectlimitsearch=="" ){
             $list_product_search=$this->product->Authsearch_productorderby($word,$selectnamepricesearch);   
                
                return view('Clients.Product.List_Search_Product',compact('list_product_search'));
            }else if($selectlimitsearch!=="" && $selectnamepricesearch==""){
             $list_product_search=$this->product->Authsearch_productlimit($word,$selectlimitsearch);   
                return view('Clients.Product.List_Search_Product',compact('list_product_search'));
            }else if($selectnamepricesearch!=="" && $selectlimitsearch!==""){
             $list_product_search=$this->product->Authsearch_productall($word,$selectlimitsearch,$selectnamepricesearch);   
                return view('Clients.Product.List_Search_Product',compact('list_product_search'));  
            }
        }
        return view('Clients.Search_Product',compact('list_product_search','Title','word'));
    }
    public function like_product($id){
       if(!Auth::check()){
            return redirect()->route('Account.Login')->with('error','Vui lòng đăng nhập');
       }else{
            // check tồn tại
            $checkfavorite=$this->product->checkfavorite($id);
            if($checkfavorite){
                // nếu tồn tại sản phảm yêu thích thì xóa
                $this->product->deletefavorite($id);
                $this->product->updatequantityfavoriteremove($id);
                return redirect()->back()->with('success','Xóa sản phẩm yêu thích thành công');
            }else{
                $this->product->addfavorite($id);
                $this->product->updatequantityfavorite($id);
                return redirect()->back()->with('success','Thêm sản phẩm yêu thích thành công');
            }
       }
    }   
}
