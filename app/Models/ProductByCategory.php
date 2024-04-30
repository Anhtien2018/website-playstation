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
    public function GetProductByCategory(){
        return DB::table($this->table)->
        where('id_variant_category','=',$this->id)->paginate(12);
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
    public function FilterPriceProductByCategory(){
        $list_productbycategory=DB::table($this->table)->
        where($this->table.'.id_variant_category','=',$this->id)->
        orderBy($this->table.'.Reduced_product',$this->selectnameprice)->
        get();
        return $list_productbycategory;
        }
    public function FilterNameProductByCategory(){
        $list_productbycategory=DB::table($this->table)->
        where($this->table.'.id_variant_category','=',$this->id)->
        orderBy($this->table.'.Name_product',$this->selectnameprice)->
        get();
        return $list_productbycategory;
    }
    public function FilterLimitProductByCategory(){
        $list_productbycategory=DB::table($this->table)->
        where($this->table.'.id_variant_category','=',$this->id)->
        limit($this->selectlimit)->
        get();
        return $list_productbycategory;
    }
    public function FilterPriceLimitProductByCategory (){
        $list_productbycategory=DB::table($this->table)->
        where($this->table.'.id_variant_category','=',$this->id)->
        orderBy($this->table.'.Reduced_product',$this->selectnameprice)->
        limit($this->selectlimit)->
        get();
        return $list_productbycategory;
        
    }
    public function FilterNameLimitProductByCategory (){
        $list_productbycategory=DB::table($this->table)->
        where($this->table.'.id_variant_category','=',$this->id)->
        orderBy($this->table.'.Name_product',$this->selectnameprice)->
        limit($this->selectlimit)->
        get();
        return $list_productbycategory;
    }
}
