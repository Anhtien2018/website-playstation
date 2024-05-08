<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Checkout;
class LiveSearchProduct extends Component
{
    public $keySearch='';
    public $product;
    public $get='';
    public $select;
    public $checkout;
    public $province;
    public $selectedProvince='';
    public function __construct(){
        $this->product=new Product;
        $this->checkout=new Checkout;
    }
    public function updatedSelectedProvince(){
      dd('ok');
    }
    public function mount(){
      $this->province=$this->checkout->getprovince();
    }
    public function render()
    {
        // gán bằng rỗng
        $list_product_search=[];
        // xét nếu không rỗng thì show
      if(!empty($this->keySearch)){
        $list_product_search=$this->product->search_product($this->keySearch);
      }
        return view('livewire.live-search-product',compact('list_product_search'));
    }
    
}
