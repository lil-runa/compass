<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            'post_title' => 'min:4|max:50',
            'post_body' => 'min:10|max:500',
            'comment' => 'required|string|max:2500',
            'main_category' => 'required|max:100|string|unique:main_categories',
        ];
    }

    public function messages(){
        return [
            'post_title.min' => 'タイトルは4文字以上入力してください。',
            'post_title.max' => 'タイトルは50文字以内で入力してください。',
            'post_body.min' => '内容は10文字以上入力してください。',
            'post_body.max' => '最大文字数は500文字です。',
            'comment.required' => '必須項目です',
            'comment.string' => '使用出来ない文字があります',
            'comment.max' => '2500以内で入力してください',
            'main_category.required' => '必須項目です',
            'main_category.max' => '100字以内',
            'main_category.string' => '使用出来ない文字があります',
            'main_category.unique' => '同じ名前は使用出来ません',
        ];
    }
}
