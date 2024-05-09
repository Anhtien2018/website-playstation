<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
class CommentProduct extends Component
{
    
    
    #[Validate('required', message: 'Vui lòng nhập nội dung bình luận')]
     public $comment_content;
    //  biến id product
    public $id_product;
    // trỏ tới model comment
    public $comment;
    // Trỏ tới chat
    public $chat;
    // gắn show comments
    public $comments;
    public function __construct(){
        $this->comment=new Comment;
        $this->chat=new Chat;
    }
   public function mount($id_product){
    // Get id product của sản phẩm 
        $this->id_product=$id_product;
   }
   public function repcomment($value){
    $this->validate();
    $data=(object)[
        'id_product'=>$this->id_product,
        'id_user'=>Auth::user()->id,
        'parent_comment_id'=> $value,
        'in_comming'=>'out_comming',
        'comment_content'=>$this->comment_content,
        'created_at'=>now()
    ];
    $this->comment->Repcomment($data);
    $this->comment->update_parent_comment_id($value);
    $this->comment_content='';
    $this->comment->update_quantity_comment($this->id_product);

   }
   public function add(){
    $this->validate();
        $data=(object)[
            'id_product'=>$this->id_product,
            'id_user'=>Auth::user()->id,
            'in_comming'=>'is_comming',
            'comment_content'=>$this->comment_content,
            'created_at'=>now()
        ];
        $this->comment->Postcomment($data);
        $this->comment->update_quantity_comment($this->id_product);
   }
   
    public function render()
    {
        $this->comments=$this->comment->Showcomment($this->id_product);
        return view('livewire.comment-product');
    }
}
