<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class main_categoryFormRequest extends FormRequest
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
            'main_category' => 'required|max:100|string|unique:main_categories',
        ];
    }

    public function messages(){
        return [
            'main_category.required' => '必須項目です',
            'main_category.max' => '100字以内',
            'main_category.string' => '使用出来ない文字があります',
            'main_category.unique' => '同じ名前は使用出来ません',
        ];
    }
}
