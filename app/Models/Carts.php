<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\alert;

class Carts extends Model
{
    public $table= "product";
        public function checkquantitycart($id){
            return DB::table($this->table)->where('id','=',$id)->get();
        }
        public function add($product,$quantity){
            //  khởi tạo biến cart
            $cart = Session::get('cart', []);
            //  nếu biến cart đã tồn tại id thì thêm số lượng
            if(isset($cart[$product->id])){
                // nếu có truyền quantity thì cộng bằng nó hoặc cộng thêm 1
                if(($quantity)>($this->checkquantitycart($product->id)[0]->Quantity_product)){
                    $data=[
                        'mess'=>'Số lượng sản phẩm không đủ',
                        'alert'=>'warning'
                    ];
                }else{
                    $cart[$product->id]['quantity']+=$quantity ? $quantity :1;
                    $data=[
                        'mess'=>'Cập nhật số lượng thành công',
                        'alert'=>'success'
                    ];
                }
                //  ngược lại
            }else{
                if($quantity>$this->checkquantitycart($product->id)[0]->Quantity_product){
                    $data=[
                        'mess'=>'Số lượng sản phẩm không đủ',
                        'alert'=>'warning'
                    ];
                }else{
                    $cart[$product->id]=[
                        'id_product'=>$product->id,
                        'Name'=>$product->Name_product,
                        'Image'=>$product->Image_product,
                        'Cost'=>$product->Cost_product,
                        'Reduced'=>$product->Reduced_product,
                        'quantity'=>$quantity ? $quantity : 1,
                    ];
                    $data=[
                        'mess'=>'Thêm sản phẩm thành công',
                        'alert'=>'success'
                    ];
                }
            }
            //  Cập nhật session cart
                Session::put('cart', $cart);
                return $data;
        }
        public function totalprice(){
            $total=0;
            $cart = Session::get('cart', []);
            foreach ($cart as $key => $show) {
                $total+=$show['quantity']*$show['Reduced'];
            }
            return $total;
        }
        // remove on item in session cart
        public function removeonepr($id){
            $cart = Session::get('cart', []);
            if(isset($cart[$id])){
                unset($cart[$id]);
                Session::put('cart', $cart);
            }
        }
        public function removeall(){
            $cart=[];
            Session::put('cart', $cart);
        }
        // Change quantity hight
        public function change_quantityhight($id){
            $cart= Session::get('cart',[]);
            if(isset($cart[$id])){
                if(($cart[$id]['quantity'])==($this->checkquantitycart($id)[0]->Quantity_product)){
                    $data=[
                        'mess'=>'Số lượng sản phẩm không đủ',
                        'alert'=>'warning'
                    ];
                }else{
                    $cart[$id]['quantity']++;
                    $data=[
                        'mess'=>'Tăng số lượng sản phẩm thành công',
                        'alert'=>'success'
                    ];
                    Session::put('cart', $cart);
                }
                return $data;
            }
        }
        // change quantity low
        public function change_quantitylow($id){
            $cart= Session::get('cart',[]);
            if(isset($cart[$id])){
                if($cart[$id]['quantity']==1){
                    unset($cart[$id]);
                    $data=[
                        'mess'=>'Sản phẩm đã được xóa',
                        'alert'=>'error'
                    ];
                }else{
                    $cart[$id]['quantity']--;
                    $data=[
                        'mess'=>'Giảm số lượng sản phẩm thành công',
                        'alert'=>'success'
                    ];
                }
                Session::put('cart', $cart);
                return $data;
            }
        }
        // change quantity write
        public function change_write($id,$quantity){
            $cart= Session::get('cart',[]);
            if($cart[$id]){
                if($quantity==0){
                    $data=[
                        'mess'=>'Xóa sản phẩm thành công',
                        'alert'=>'success'  
                    ];
                }else if($quantity>$this->checkquantitycart($id)[0]->Quantity_product){
                    $data=[
                        'mess'=>'Số lượng sản phẩm không đủ',
                        'alert'=>'warning'
                    ];
                }else{
                    $cart[$id]['quantity']=$quantity;
                    $data=[
                        'mess'=>'Cập nhật số lượng thành công',
                        'alert'=>'success'
                    ];
                }  
            }
            Session::put('cart', $cart);
            return $data;
        }
    

}
