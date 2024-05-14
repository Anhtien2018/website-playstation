<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\CheckoutModel;
use Livewire\Attributes\Validate;

class ProfileUser extends Component
{
    public $chat;
    public $getuser;
    public $get_all_order=[];
    public $checkout;
    public $get_select;
    public $close_modal=false;
    #[Validate('required',message:'Vui lòng nhập email')]
    #[Validate('email',message:'Email không đúng định dạng')]
    public $email;
    #[Validate('required',message:'Vui lòng nhập mật khẩu cũ')]
    #[Validate('min:6',message:'Mật khẩu không dưới 6 kí tự')]
    public $password_before;
    #[Validate('required',message:'Vui lòng nhập mật khẩu mới')]
    #[Validate('min:6',message:'Mật khẩu không dưới 6 kí tự')]
    public $password_after;
    #[Validate('required',message:'Vui lòng xác nhận mật khẩu mới')]
    #[Validate('min:6',message:'Xác nhận mật khẩu không dưới 6 kí tự')]
    #[Validate('same:password_before',message:'Mật khẩu mới không trùng')]
    public $password_after_confirm;
   
    public function __construct(){
        $this->chat=new Chat;
        $this->checkout=new CheckoutModel;
    }
    public function mount(){
        $this->get_all_order=$this->checkout->get_all_order(Auth::user()->id);
        $this->getuser=$this->chat->getuser(Auth::user()->id);
    }
    // change_option order
    public function select_order(){
       if ($this->get_select=="") {
        $this->get_all_order=$this->checkout->get_all_order(Auth::user()->id);
       }else{
        $this->get_all_order=$this->checkout->get_orderby_order(Auth::user()->id,$this->get_select);
       }
    }
    // hủy đơn hàng
    public function cancle_order($id_order){
        $this->checkout->cancle_order($id_order);
        $this->get_all_order=$this->checkout->get_all_order(Auth::user()->id);
        session()->flash('message','Hủy đơn hàng thành công');
    }
     public function change_password() {
        // Set Flash Message
        $this->dispatchBrowserEvent('toast', [
            'type'=> 'success',
            'message' => 'Profile updated successfully!'
        ]);
       
    }
    public function close(){
        $this->close_modal=true;
    }
    public function render()
    {
        return view('livewire.profile-user');
    }
}
