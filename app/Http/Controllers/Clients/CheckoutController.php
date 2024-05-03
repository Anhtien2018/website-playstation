<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Checkout;
class CheckoutController extends Controller
{
    public $checkout;
    public function __construct(){
        $this->checkout=new Checkout;        
    }
    public function checkout(Request $request){
        $Title="Checkout";
        $province=$this->checkout->getprovince();
        
        return view('Clients.CheckOut',compact('Title','province'));
      }
      public function getdistrict(Request $request){
        if($request->ajax()){
            $district=$this->checkout->getdistrict($request->matp);
            return response()->json($district);
        }
      }
}
