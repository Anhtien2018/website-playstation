<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Banner extends Model
{
    use HasFactory;
    public $table="banners";
    public function showbnleft(){
        return DB::table($this->table)->where('category_banner','=','bannerhomeleft')->get();
    }
    public function showbnright(){
        return DB::table($this->table)->where('category_banner','=','bannerhomeright')->get();
    }
    public function showslide(){
        return DB::table($this->table)->where('category_banner','=','homebannerslide')->get();
    }
    public function showbnbottom(){
        return DB::table($this->table)->where('category_banner','=','bannerhomebottom')->get();
    }
   
}
