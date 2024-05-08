<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatApp extends Component
{
    public $Message;
    public $chat;
    public $Messageadmin;
    public $content_message='';
    public $clickdetail=false;
    public $getmessagedetail;

    public function __construct(){
        $this->chat=new Chat;
    }
    public function send() {
            $data=(object)[
                'id_user'=>Auth::user()->id,
                'content_message'=>$this->content_message,
                'sender'=>'user',
                'conversation_id'=>Auth::user()->id,
                'created_at'=>now(),
            ];
        $this->chat->postmessageuser($data);
        $this->content_message='';
    }
    public function sendadmin($item){
        $data=(object)[
            'id_user'=>Auth::user()->id,
            'content_message'=>$this->content_message,
            'sender'=>'admin',
            'conversation_id'=>$item,
            'created_at'=>now(),
        ];
        $this->chat->postmessageuser($data);
        $this->content_message='';
    }
   public function detailmessage($item){
        $this->clickdetail=true;
        $this->getmessagedetail=$this->chat->getmessagedetail($item);
    }
    public function resultmessage(){
        $this->clickdetail=false;
    }
    public function render()
    {
        if($this->clickdetail){
            $this->getmessagedetail=$this->chat->getmessagedetail($this->getmessagedetail[0]->conversation_id);
            return view('livewire.chat-app-detail');
        }else{
            if (Auth::check()) {
                $this->Message=$this->chat->getmessages(Auth::user()->id);
                $this->Messageadmin=$this->chat->Messageadmin();
             }
            return view('livewire.chat-app');
        }
       
    }
    
}
