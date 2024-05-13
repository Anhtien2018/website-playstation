<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CheckoutModel;
use App\Models\Carts;
use Flasher\Laravel\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
  public $checkout;
    public function __construct(){
      $this->checkout=new CheckoutModel;
    }
    public function checkout(Request $request){
        $Title="Checkout";
        return view('Clients.CheckOut',compact('Title'));
      }
    public function viewbill(){
      $Title='Bill';
      $data_order=$this->checkout->get_order(Auth::user()->id);
      $data_order_detail=$this->checkout->get_order_detail($data_order[0]->id_order);
      return view('Clients.BillOrder',compact('Title','data_order_detail','data_order'));
    }
      }

