<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Comment extends Model
{
    protected $table='comments';
    protected $table1='product';
    public function Showcomment($id){
        return DB::table($this->table)->where($this->table.'.id_product','=',$id)->get()->groupBy('parent_comment_id');
    }
    public function Postcomment($data){
        return DB::table($this->table)->insert([
            'id_product'=>$data->id_product,
            'id_user'=>$data->id_user,
            'in_comming'=>$data->in_comming,
            'comment_content'=>$data->comment_content,
            'created_at'=>$data->created_at
        ]);
    }
    public function Repcomment($data){
        return DB::table($this->table)->insert([
            'id_product'=>$data->id_product,
            'id_user'=>$data->id_user,
            'parent_comment_id'=>$data->parent_comment_id,
            'in_comming'=>$data->in_comming,
            'comment_content'=>$data->comment_content,
            'created_at'=>$data->created_at
        ]);
    }
    public function update_parent_comment_id($parent_comment_id){
        return DB::table($this->table)->where($this->table.'.id_comment','=',$parent_comment_id)->update(['parent_comment_id'=>$parent_comment_id]);
    }
    public function update_quantity_comment($id){
        return DB::table($this->table1)->where('id','=',$id)->increment('comment_product');
    }
    
}
