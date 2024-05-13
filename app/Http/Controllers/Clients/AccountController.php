<?php

namespace App\Http\Controllers\Clients;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\updatePasswordRequest;
use App\Http\Controllers\Controller;
use App\Mail\AlertRegister;
use App\Mail\VerifyResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PasswordReset;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    protected $passwordreset;
    public $chat;
    public function __construct() {
        $this->passwordreset=new PasswordReset;
        $this->chat=new Chat;
    }
    public function Register(){
        $Title='Đăng Ký';
        return view('Clients.Register',compact('Title'));
    }
    public function Auth_Register(RegisterRequest $request){
        $user=(['phone'=>$request->Phone,'avatar'=>'anh','name'=>$request->Name,'email'=>$request->Email,'permission'=>1,'password'=>Hash::make($request->Password)]);
            try {
               $acc=User::create($user);
               Mail::to($acc->email)->send(new AlertRegister($acc));
                return redirect()->route('Account.Login')->with('success','Đăng ký tài khoản thành công');
            } catch (\Throwable $th) {
                //throw $th;
                return redirect()->route('Account.Register')->with('error','Đăng ký tài khoản thất bại');
            }
    }
     //  verify email
    public function Login(){
        $Title='Đăng Nhập';
        return view('Clients.Login',compact('Title'));
    }
    public function Auth_Login(LoginRequest $request){  
        // get provider: quản lí người dùng 
        // retrieveByCredentials: Tìm kiếm các đối tượng được cung cấp để xác thực trong db 
        $user=Auth::attempt(['phone'=>$request->Phone,'password'=>($request->Password)]);
         if($user){
            return redirect()->route('Home')->with('success','Bạn đã đăng nhập thành công');
        }
            return redirect()->route('Account.Login')->with('error','Tài khoản hoặc mật khẩu của bạn chưa chính xác');
    }
   
    public function Logout(){
        Auth::logout();
       return redirect()->route('Home')->with('success','Đăng xuất thành công');    
    }
    // show form lấy lại mật khẩu
    public function viewresetpass(){
        $Title="Lấy lại mật khẩu";
        return view('Clients.ForgetPassword',compact('Title'));
    }
    // Lấy dữ liệu và so sánh
    public function Auth_viewresetpass(ForgetPasswordRequest $request){
        $Email=$request->Email;
        $Phone=$request->Phone;
        $token=Str::random(60);
        $checkreset=User::where('email',$Email)->first();
        if(!$checkreset){
          return redirect()->back()->with('error','Email của bạn không chính xác');
        }else if($checkreset->phone!==$Phone){
            return redirect()->back()->with('error','Số điện thoại của bạn không chính xác');
        }else{  
            $checkconfirm=$this->passwordreset->GetResetPassword($Email,$Phone);
            // dd($checkconfirm->all());
            if(!$checkconfirm->all()==[]){
                // nếu đã từng reset thì update token
                $this->passwordreset->updateResetPassword($Email,$Phone,$token);
                // send mail
                Mail::to($checkreset)->send(new VerifyResetPassword($checkreset,$token));
                return redirect()->back()->with('success','yêu cầu của bạn đã được xử lý, vui lòng kiểm tra email');
            }else{
                // Nếu chưa từng reset thì thêm vào bảng
                $this->passwordreset->createResetPassword($Email,$Phone,$token);
                Mail::to($checkreset)->send(new VerifyResetPassword($checkreset,$token));
                return redirect()->back()->with('success','yêu cầu của bạn đã được xử lý, vui lòng kiểm tra email');
            }
        }
    }
    // show form
    public function showformreset($token){
        // lấy token
        $tokendata=$this->passwordreset->where('token',$token)->firstOrFail();
        $getuse=$this->passwordreset->Getuser($tokendata);
        $Title="Cập nhật mật khẩu";
        return view('Clients.FormUpdatePassword',compact('Title','getuse'));
    }
    // cập nhật 
    public function Auth_updatepassword($token, updatePasswordRequest $request) {
        // lấy token
        $tokendata=$this->passwordreset->where('token',$token)->firstOrFail();
        $getuse=$this->passwordreset->Getuser($tokendata)->all();
        $Phone=$getuse[0]->phone;
        $Email=$getuse[0]->email;
        $Password=Hash::make($request->Password);
       $this->passwordreset->UpdatePassowrd($Phone,$Email,$Password);
       return redirect()->route('Account.Login')->with('success','Đổi mật khẩu thành công');
    }
    public function Profile(){  
       
        return view('Clients.Profile');
    }
}
