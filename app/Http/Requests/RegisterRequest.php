<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Name'=>'required | min:5 ',
            'Phone'=>'required|unique:users',
            'Email'=>'required|email|unique:users',
            'Password'=>' required|min:6',
            'Password_confirm'=>' required |same:Password| min: 6'
        ];
    }
    public function messages(){
        return [
            // Validation Name
            'Name.required'=>'Vui lòng nhập họ tên của bạn',
            'Name.min'=>'Họ tên không được dưới 5 ký tự',
            // Validation Phone
            'Phone.required'=>'Vui lòng nhập số điện thoại của bạn',
            'Phone.numeric'=>'Số điện thoại không được chứa kí tự',
            'Phone.digits'=>'Số điện thoại không đúng định dạng',
            'Phone.unique'=>"Số điện thoại $this->Phone đã tồn tại",
            // Validation Email
            'Email.required'=>'Vui lòng nhập email của bạn',
            'Email.unique'=>"$this->Email đã tồn tại",
            'Email.email'=>'Email của bạn không đúng định dạng',
            // validation Password
            'Password.required'=>'Vui lòng nhập mật khẩu của bạn',
            // 'Password.same'=>'Mật khẩu của bạn không trùng',
            'Password.min'=>'Mật khẩu của bạn không dưới 6 ký tự',
            'Password_confirm.required'=>'Vui lòng xác nhận mật khẩu',
            'Password_confirm.min'=>'Xác nhận mật khẩu không dưới 6 ký tự',
            'Password_confirm.same'=>'Mật khẩu của bạn không trùng'
        ];
    }
}
