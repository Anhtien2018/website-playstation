<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Checkout extends Model
{

    use HasFactory;
    protected $table= 'province';
    protected $table1= 'district';
    protected $table2= 'ward';
    public function getprovince(){
        return DB::table($this->table)->get();
    }
    public function getdistrict($matp){
        return DB::table($this->table1)->where($this->table1.'.matp','=',$matp)->get();
    }
}
