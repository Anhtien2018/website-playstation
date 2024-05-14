<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CheckoutModel;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{   
    public $checkout;
    public function __construct(){
        $this->checkout=new CheckoutModel;
    }
    public function Profile(){  
        $Title="Profile";
         return view('Clients.Profile',compact('Title'));
     }
}
