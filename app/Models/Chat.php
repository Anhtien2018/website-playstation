<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Chat extends Model
{
    use HasFactory;
    protected $table='messages';
    protected $table1='users';
    public function getmessages($iduser){
          return DB::table($this->table)->where($this->table.'.conversation_id','=',$iduser)->orderBy('created_at','asc')->get();
    }
    public function Messageadmin(){
        return DB::table($this->table)->orderBy('id_message','desc')->get()->groupBy('conversation_id');
    }
    public function getuser($id){
        return DB::table($this->table1)->where('id','=',$id)->get();
    }
    public function getfistmessage($conversation_id){
        return DB::table($this->table)->where($this->table.'.conversation_id','=',$conversation_id)->orderBy($this->table.'.id_message','desc')->limit(1)->get();
    }
    public function getmessagedetail($conversation_id){
        return DB::table($this->table)->where($this->table.'.conversation_id','=',$conversation_id)->orderBy($this->table.'.id_message','asc')->get();
    }
    public function postmessageuser($data){
        return DB::table($this->table)->insert([
                'id_user'=>$data->id_user,
                'content_message'=>$data->content_message,
                'sender'=>$data->sender,
                'conversation_id'=>$data->conversation_id,
                'created_at'=>$data->created_at,
        ]);
    }
}
