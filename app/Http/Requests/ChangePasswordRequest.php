<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
            'new-password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'current-password.required' => '現在のパスワードが未入力です',
            'new-password.required' => '新しいパスワードが未入力です',         
            'new-password.string' => 'パスワードは文字で入力してください',         
            'new-password.min' => '新しいパスワードは６文字以上にしてください',         
            'new-password.confirmed' => '新しいパスワードが確認欄と一致していません',         
            'new-password_confirmation.required' => '新しいパスワードを再度入力してください',         

        ];
    }
}
