<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
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
             'Email'=>'required|email'
         ];
    }
    public function messages(){
        return [
            // Validation Name
            'Phone.required'=>'Vui lòng nhập số điện thoại của bạn',
            'Phone.digits'=>'Số điện thoại không đúng định dạng',
            // validation Email
            'Email.required'=>'Vui lòng nhập email của bạn',
            'Email.email'=>'Email không đúng định dạng'
        ];
    }
}
