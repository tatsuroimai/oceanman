<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostAddRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2000',
            'title' => 'required',
            'message' => 'nullable', 
            'topic' => 'required', 
        ];

    }

    public function messages()
    {
        return [
            'image.required' => '画像が選択されていません',
            'image.image' => '画像ファイルを選択してください',         
            'title.required' => 'タイトルが未入力です',
            'topic.required' => 'トピックが未入力です',
        ];
    }
}
