<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class commentFormRequest extends FormRequest
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
            'comment' => 'required|string|max:2500',
        ];
    }

    public function messages(){
        return [
        'comment.required' => '必須項目です',
        'comment.string' => '使用出来ない文字があります',
        'comment.max' => '2500以内で入力してください',
        ];
    }
}
