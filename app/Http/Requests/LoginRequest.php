<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
           'Phone'=>'required | digits:10',
            'Password'=>' required|min:6',
        ];
    }
    public function messages(){
        return [
            // Validation Name
            'Phone.required'=>'Vui lòng nhập số điện thoại của bạn',
            'Phone.digits'=>'Số điện thoại không đúng định dạng',
            // Validation Passowrd
            'Password.required'=>'Vui lòng nhập mật khẩu của bạn',
            'Password.min'=>'Mật khẩu phải hơn 6 ký tự',
        ];
    }
   
}
