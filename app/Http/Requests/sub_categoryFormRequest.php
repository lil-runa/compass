<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sub_categoryFormRequest extends FormRequest
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
            'sub_category_name' => 'required|max:100|string|unique:sub_categories,sub_category',
        ];
    }

    public function messages(){
        return [
            'sub_category_name.required' => '必須項目です',
            'sub_category_name.max' => '100字以内',
            'sub_category_name.string' => '使用出来ない文字があります',
            'sub_category_name.unique' => '同じ名前は使用出来ません',
        ];
    }
}
