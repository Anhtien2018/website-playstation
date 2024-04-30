<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    // Table để gán tên bảng database để bảo mật hơn
     protected $table='category';
     protected $table1='variant_category';
    public function GetAllCategory (){
        $list_category=DB::table($this->table)->get();
        return $list_category;
    }
    public function showall(){
        return DB::table($this->table)->join($this->table1,$this->table1.'.id_category','=',$this->table.'.id_category')->get()->groupBy('Name_category');
    }
   
}
