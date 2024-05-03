<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductByCategory extends Model
{
    use HasFactory;
    protected $table='product';
    protected $table1='category';
    protected $table2='favorite_product';
    protected $table3='users';
    protected $table4='variant_category';
    protected $table5='image_by_variantcategory';
    protected $table6='banner_by_variantcategory';
    public function GetProductByCategory($id){
        return DB::table($this->table)->
        where('id_variant_category','=',$id)->paginate(12);
    }
    public function GetProductByCategoryfilterorderby($id,$selectnameprice){
        return DB::table($this->table)->
        where('id_variant_category','=',$id)->orderBy('Reduced_product',$selectnameprice)->paginate(12);
    }
    public function GetProductByCategoryfilterpagination($id,$selectlimit){
        return DB::table($this->table)->
        where('id_variant_category','=',$id)->paginate($selectlimit);
    }
    public function GetProductByCategoryfilterall($id,$selectlimit,$selectnameprice){
        return DB::table($this->table)->
        where('id_variant_category','=',$id)->orderBy('Reduced_product',$selectnameprice)->paginate($selectlimit);
    }
    public function getnamevariantcate($id){
        return DB::table($this->table1)->join($this->table4,$this->table4.'.id_category','=',$this->table1.'.id_category')->
        where($this->table4.'.id_variant_category','=',$id)->get();
    }
    public function showvariantcategory($id){
        return DB::table($this->table4)->where('id_category','=',$id)->get();
    }
    public function showbanner_bycate($id){
        return DB::table($this->table5)->where('id_variant_category','=',$id)->get();
    }
    public function get_banner_mayps5($id){
        return DB::table($this->table6)->where('id_variant_category','=',$id)->get();
    }
   
}
