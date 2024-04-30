<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updatePasswordRequest extends FormRequest
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
            'Password'=>' required|min:6',
            'Password_confirm'=>' required |same:Password| min: 6'
        ];
    }
    public function messages(){
        return [
           
            'Password.required'=>'Vui lòng nhập mật khẩu của bạn',
            // 'Password.same'=>'Mật khẩu của bạn không trùng',
            'Password.min'=>'Mật khẩu của bạn không dưới 6 ký tự',
            'Password_confirm.required'=>'Vui lòng xác nhận mật khẩu',
            'Password_confirm.min'=>'Xác nhận mật khẩu không dưới 6 ký tự',
            'Password_confirm.same'=>'Mật khẩu của bạn không trùng'
        ];
    }
}
