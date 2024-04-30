<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PasswordReset extends Model
{
    use HasFactory;
    public $table="password_reset_tokens";
    public $table1="users";
    public function GetResetPassword($Email,$Phone){
        $listreset=(object)DB::table($this->table)->where('email','=',$Email)->where('phone','=',$Phone)->limit(1)->get();
        return $listreset;
    }
    public function createResetPassword($Email,$Phone,$token){
        DB::table($this->table)->insert([
            ['email'=>$Email,'phone'=>$Phone,'token'=>$token,'created_at'=>now()]
        ]);
    }
    public function updateResetPassword($Email,$Phone,$token){
        DB::table($this->table)->where('email','=',$Email)->where('phone','=',$Phone)->update(['token' => $token, 'created_at'=>now()]);
    }
    public function Getuser($tokendata){
        $listuser= DB::table($this->table1)->where('phone','=',$tokendata->phone)->where('email','=',$tokendata->email)->get();
        return $listuser;
    }
    public function UpdatePassowrd($Phone,$Email,$Password){
        DB::table($this->table1)->where('phone','=',$Phone)->where('email','=',$Email)->update(['password'=>$Password]);
    }
}
