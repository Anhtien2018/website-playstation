<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ProductDetail extends Model
{
    use HasFactory;
    protected $table="product";
    protected $table1="detail_product";
    protected $table2="content_detail_product";
    protected $table3="image_product";
    protected $table4="product_include";
    protected $table5="policy";
    protected $table6="category";
    protected $table7="variant_category";
    protected $table8="detail_information";
    protected $table9="image_detail";
   
    public function detail($id){
        return DB::table($this->table1)->
        join($this->table2,$this->table2.'.id_content','=',$this->table1.'.id_content')->
        where($this->table1.'.id_product','=',$id)
        ->get();
    }
    public function getimagedetail($id){
        return DB::table($this->table3)->where('id_product','=',$id)->get();
    }
    public function getbannerdetail($id){
        return DB::table($this->table9)->where('id_product','=',$id)->get();
    }
    public function getproductinclude($id){
        return DB::table($this->table4)->
        join($this->table2,$this->table2.'.id_content','=',$this->table4.'.id_content')->
        where($this->table4.'.id_product','=',$id)->
        get()->groupBy('name_content_detail');
    }
    public function getpolicy(){
        return DB::table($this->table2)->
        join($this->table5,$this->table5.'.id_content','=',$this->table2.'.id_content')->
        get()->
        groupBy('name_content_detail');
    }
    public function getcategory_product($id){
        return DB::table($this->table6)->
        join($this->table7,$this->table7.'.id_category','=',$this->table6.'.id_category')->
        join($this->table,$this->table.'.id_variant_category','=',$this->table7.'.id_variant_category')->
        where($this->table.'.id','=',$id)->
        get();
    }
    public function show_product_by_category($id){
        return DB::table($this->table7)->join($this->table,$this->table.'.id_variant_category','=',$this->table7.'.id_variant_category')->
        where($this->table.'.id_variant_category','=',$id)->get();
    }
    public function updateview($id){
        return DB::table($this->table)->where('id','=',$id)->increment('view_product');
    }
    public function getinformationdetail($id){
        return DB::table($this->table8)->where('id_product','=',$id)->get();
    }

}
