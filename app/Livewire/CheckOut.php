<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Carts;
use Illuminate\Support\Facades\Session;
use App\Models\CheckoutModel;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CheckOut extends Component
{
    public $carts;
    public $getcart;
    public $total;
    public $total_quantity;
    public $end;
     public $vocher='';
    public $name='';
    public $phone='';
    public $email='';
    public $payment='';
    public $note_order='';
    public $checkinput=true;
    public $discount_vocher=0;
    public $date;
    public $checkvocher;
    public $get_province;
    public $get_district;
    public $get_ward;
    public $specific_address='';
    public $checkout;
    public $show_province;
    public $show_district=[];
    public $show_wards=[];
    public $data_order;
    public $check_order=false;
    public $data;
    // khởi tạo 
    public function __construct(){
        $this->carts=new Carts;
        $this->date=now();
        $this->checkout=new CheckoutModel;
    }
    public function rules() 
    {
        return [
            'name' =>'required',
            'phone'=>'required|numeric',
            'email'=>'required|email',
            'get_province'=>'required',
            'get_district'=>'required',
            'get_ward'=>'required',
            'specific_address'=>'required',
            'payment'=>'required'
        ];
    }
 
    public function messages() 
    {
        return [
            'name.required' => 'Họ tên không được để rỗng.',
            'phone.required' => 'Số điện thoại không được để rỗng.',
            'phone.numeric' => 'Số điện thoại không chứa kí tự.',
            'email.required' => 'Email không được để rỗng.',
            'email.email' => 'Email không đúng định dạng.',
            'get_province.required' => 'Vui lòng chọn thành phố.',
            'get_district.required' => 'Vui lòng chọn quận huyện .',
            'get_ward.required' => 'Vui lòng chọn phường xã.',
            'specific_address.required' => 'Số nhà không được để rỗng.',
            'payment.required' => 'Vui lòng chọn phương thức thanh toán.',
        ];
    }
    // Cho Chạy đầu
    public function mount(){
     $this->getcart=Session::get('cart',[]); 
        foreach ($this->getcart as $value) {
            $this->total+=$value['quantity']*$value['Reduced'];
            $this->total_quantity+=$value['quantity'];
        }
        $this->end=$this->total;
        $this->show_province=$this->checkout->show_province();
    }
  
    // Chọn thành phố
    public function change_province(){
        
        $this->show_district=$this->checkout->show_district($this->get_province);
    }
    // Chọn phường huyện
    public function change_district(){
        $this->show_wards=$this->checkout->show_ward($this->get_district);
    }
    // chọn xã
    public function change_ward(){
        
    }
    // Thêm vocher
    public function addvocher(){
        // check vocher nhập 
        $this->checkvocher=$this->carts->checkvocher($this->vocher);
        if ($this->checkvocher) {
            if ($this->date < $this->checkvocher[0]->date_start) {
            session()->flash('message','Vocher chưa được sử dụng');
            }else if($this->date > $this->checkvocher[0]->date_end){
            session()->flash('message','Vocher quá hạn sử dụng');
            }else{
            $this->discount_vocher=($this->total*$this->checkvocher[0]->discount_vocher)/100;
            $this->end=$this->total-$this->discount_vocher;
            session()->flash('message','Áp dụng vocher thành công');
            $this->vocher='';
            $this->checkinput=false;
            }
        }else{
            session()->flash('message','Vocher không tồn tại');
        }
    }
    public function order(){
        // validate
        $this->validate();
        
        // get data and create
        $this->data_order=[
            'id_user'=>Auth::user()->id,
            'name_order'=>$this->name,
            'phone_order'=>$this->phone,
            'email_order'=>$this->email,
            'id_vocher'=>$this->checkvocher[0]->id_vocher ?? 0,
            'total_quantity'=>$this->total_quantity,
            'total_price'=>$this->end,
            'payment_method'=>$this->payment,
            'status_order'=>'gio-hang',
            'note_order'=>$this->note_order,
            'province_order'=>$this->checkout->get_province($this->get_province)[0]->name,
            'district_order'=>$this->checkout->get_district($this->get_district)[0]->name,
            'ward_order'=>$this->checkout->get_ward($this->get_ward)[0]->name,
            'specific_address_order'=>$this->specific_address,
            'created_at'=>now()
        ];
        // thêm vào giỏ hàng
        $id_order=$this->checkout->create_order($this->data_order);
        // data order detail
        foreach (Session::get('cart',[]) as $value) {
            $data_order_detail=[
                'id_product'=>$value['id_product'],
                'quantity_product_order'=>$value['quantity'],
                'total_price_order'=>$value['quantity']*$value['Reduced'],
                'id_order'=>$id_order
            ] ;
        // thêm vào giỏ hàng chi tiết
        $this->checkout->create_order_detail($data_order_detail);
            }
        // set cart  rỗng và update lại
        $cart=[]; 
        Session::put('cart', $cart); 
        // chuyển đến bill
        return redirect()->route('Cart.viewbill');
        }
    public function render()
    {
            return view('livewire.check-out');

        
    }
}
