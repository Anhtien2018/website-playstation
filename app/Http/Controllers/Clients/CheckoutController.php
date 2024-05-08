<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Checkout;
use App\Models\Carts;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    public $checkout;
    public $cart;
    public function __construct(){
        $this->checkout=new Checkout;        
        $this->cart=new Carts;        
    }
    public function checkout(Request $request){
        $Title="Checkout";
        $province=$this->checkout->getprovince();
        $cart=Session::get('cart',[]);
        $total_price=$this->cart->totalprice();
        return view('Clients.CheckOut',compact('Title','province','cart','total_price'));
      }
      public function getdistrict(Request $request,$id){
       
            $district=$this->checkout->getdistrict($id);
            $options='';
            foreach ($district as $show) {
              $options .= '<option value="' . $show->maqh . '">' . $show->name . '</option>';
            }
            return response()->json(['options'=>$options]);
        }
      }

