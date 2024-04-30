<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Carts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public $cart;
    public function __construct(){
      $this->cart=new Carts;
    }
    // show cart in view
   public function viewcart(Request $request){
      $Title='Giỏ hàng';
        $index=1;
        $cart=Session::get('cart',[]);
        $total_price=$this->cart->totalprice();
      return  view('Clients.Cart',compact('Title','cart','index','total_price'));
      
   }
    // add to cart
    public function addtoCart(Product $product , Request $request) {
      if(Auth::check()){ 
        $quantity=$request->quantity;
        $data=$this->cart->add($product,$quantity);
        return redirect()->back()->with($data['alert'],$data['mess']);
      }else{
        return redirect()->route('Account.Login')->with('warning','Vui lòng đăng nhập để mua hàng');
      }
      }
      // remove on item in session cart
    public function removeone($id){
      $this->cart->removeonepr($id);
      return redirect()->back()->with('success','Bạn đã xóa sản phẩm thành công');
    }
      // change quantity when i click
    public function quantityhight(Request $request){
        $id=$request->id;
        $data=$this->cart->change_quantityhight($id);
        return redirect()->back()->with($data['alert'],$data['mess']);
    }
      // change quantity when i click
    public function quantitylow(Request $request){
      $id=$request->id;
      $data= $this->cart->change_quantitylow($id);
      return redirect()->back()->with($data['alert'],$data['mess']);
  }
      // change quantity when i write input
    public function quantitywrite(Request $request){
      $id=$request->id;
      $quantity=$request->quan;
      $data= $this->cart->change_write($id,$quantity);
      return redirect()->back()->with($data['alert'],$data['mess']);
}
}
