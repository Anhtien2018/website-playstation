<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CheckoutModel extends Model
{
    use HasFactory;
    protected $table='province';
    protected $table1='district';
    protected $table2='ward';
    protected $table3='order';
    protected $table4='order_detail';
    protected $table5='product';
    public function show_province(){
        return DB::table($this->table)->get();
    }
    public function show_district($matp){
        return DB::table($this->table1)->where($this->table1.'.matp','=',$matp)->get();
    }
    public function show_ward($maqh){
        return DB::table($this->table2)->where($this->table2.'.maqh','=',$maqh)->get();
    }
    public function get_province($matp){
        return DB::table($this->table)->where($this->table.'.matp','=',$matp)->get();
    }
    public function get_district($maqh){
        return DB::table($this->table1)->where($this->table1.'.maqh','=',$maqh)->get();
    }
    public function get_ward($xaid){
        return DB::table($this->table2)->where($this->table2.'.xaid','=',$xaid)->get();
    }
    public function create_order($data){
        return DB::table($this->table3)->insertGetId([
            'id_user'=>$data['id_user'],
            'name_order'=>$data['name_order'],
            'phone_order'=>$data['phone_order'],
            'email_order'=>$data['email_order'],
            'id_vocher'=>$data['id_vocher'],
            'total_quantity'=>$data['total_quantity'],
            'total_price'=>$data['total_price'],
            'payment_method'=>$data['payment_method'],
            'status_order'=>$data['status_order'],
            'note_order'=>$data['note_order'],
            'province_order'=>$data['province_order'],
            'district_order'=>$data['district_order'],
            'ward_order'=>$data['ward_order'],
            'specific_address_order'=>$data['specific_address_order'],
            'created_at'=>$data['created_at']
        ]);
    }
    public function create_order_detail($data_order_detail){
        return DB::table($this->table4)->insert([
            'id_product'=>$data_order_detail['id_product'],
            'quantity_product_order'=>$data_order_detail['quantity_product_order'],
            'total_price_order'=>$data_order_detail['total_price_order'],
            'id_order'=>$data_order_detail['id_order']
        ]);
    }
    public function get_order($id_user){
        return DB::table($this->table3)->where($this->table3.'.id_user','=',$id_user)->orderBy($this->table3.'.id_order','desc')->limit(1)->get();
    }
    public function get_order_detail($id_order){
        return DB::table($this->table4)->
        join($this->table5,$this->table5.'.id','=',$this->table4.'.id_product')->
        where($this->table4.'.id_order','=',$id_order)->
        get()->groupBy('id_order');
    }

}
