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
        if($request->ajax()){
            return view('Clients.Product.List_ProductPS5_Home',compact('list_productPS5'))->render();
        }
        $show12=Product::all();
        // banner left
        $bannerleft=$this->banner->showbnleft();
        // banner right
        $bannerright=$this->banner->showbnright();
        // banner slide
        $slide=$this->banner->showslide();
        // banner bottom
        $bannerbottom=$this->banner->showbnbottom();
        return view('Clients.Home',compact('Title','show12','list_productPS5','list_productGamePS5','bannerleft','bannerright','slide','bannerbottom'));
    }
    public function search_product(Request $request){
            $word=$request->word;
            $show12=$this->product->search_product($word);
            return view('Blocks.Header',compact('show12'))->render();
        // return view('Block.Home',compact('show12'));
        
        

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