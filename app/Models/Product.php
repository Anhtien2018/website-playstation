<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\table;

class Product extends Model
{

    protected $table='product';
    protected $table1='category';
    protected $table2='favorite_product';
    protected $table3='users';
    protected $table4='variant_category';
    public function __construct(){
        
    }
    // show product by ps5
    public function GetProductPs5(){
        return DB::table($this->table4)->join($this->table,$this->table.'.id_variant_category','=',$this->table4.'.id_variant_category')->
        where($this->table.'.id_variant_category','=',1)->paginate(8);
    }
    public function GetProductGamePS5(){
        return DB::table($this->table4)->join($this->table,$this->table.'.id_variant_category','=',$this->table4.'.id_variant_category')->
        where($this->table.'.id_variant_category','=',2)->paginate(8);
    }
   
    // getproduct detail and getproduct add cart
    
    public function search_product($word){
        return DB::table($this->table)->
        where($this->table.'.Name_product','like','%'.$word.'%')->get();
    }
     public function Authsearch_product($word){
        return DB::table($this->table)->
        where($this->table.'.Name_product','like','%'.$word.'%')->paginate(12);
    }
    public function Authsearch_productorderby($word,$selectnamepricesearch){
        return DB::table($this->table)->
        where($this->table.'.Name_product','like','%'.$word.'%')->orderBy('Reduced_Product',$selectnamepricesearch)->paginate(12);
    }
    public function Authsearch_productlimit($word,$selectlimitsearch){
        return DB::table($this->table)->
        where($this->table.'.Name_product','like','%'.$word.'%')->paginate($selectlimitsearch);
    }
    public function Authsearch_productall($word,$selectlimitsearch,$selectnamepricesearch){
        return DB::table($this->table)->
        where($this->table.'.Name_product','like','%'.$word.'%')->orderBy('Reduced_product',$selectnamepricesearch)->paginate($selectlimitsearch);
    }
    // favorite product
    public function favorite_product(){
        //  chuyển đổi thành mảng to array và dùng pluck để lấy ra
       $favorite=DB::table($this->table2)->where(['id_user'=>Auth::user()->id])->pluck('id_product')->toArray();
       return $favorite;
    }
    public function checkfavorite($id){
        return DB::table($this->table2)->where('id_product','=',$id)->where('id_user','=',Auth::user()->id)->get()->toArray();
    }
    public function addfavorite($id){
        return DB::table($this->table2)->insert([
            'id_product'=>$id,
            'id_user'=>Auth::user()->id,
        ]);
    }
    public function deletefavorite($id){
        return DB::table($this->table2)->where('id_product','=',$id)->where('id_user','=',Auth::user()->id)->delete();
    }
    public function updatequantityfavorite($id){
        // tăng 1
        return DB::table($this->table)->where('id','=',$id)->increment('favorite_product');
    }
    public function updatequantityfavoriteremove($id){
        // giảm 1
        return DB::table($this->table)->where('id','=',$id)->decrement('favorite_product');
        
    }
}
