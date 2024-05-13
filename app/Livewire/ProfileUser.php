<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
class ProfileUser extends Component
{
    public $chat;
    public $getuser;
    
    public function __construct(){
        $this->chat=new Chat;
    }
    public function render()
    {
        $this->getuser=$this->chat->getuser(Auth::user()->id);
        return view('livewire.profile-user');
    }
}
