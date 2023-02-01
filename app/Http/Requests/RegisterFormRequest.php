<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
        'over_name' => 'required|string|max:10',
        'under_name' => 'required|string|max:10',
        'over_name_kana' => 'required|string|/[ァ-ヴー]+/u|max:30',
        'under_name_kana' => 'required|string|/[ァ-ヴー]+/u|max:30',
        'mail_address' => 'required|string|email|unique|max:100',
        'sex' => 'required',
        'old_year' => 'required|date|gte:2000',
        'old_month' => 'required|date',
        'old_day' => 'required|date',
        'role' => 'required',
        'password' => 'required|string|min:8,max:20|confirmed',
        ];
    }

    public function messages(){
        return [
        'over_name' => '10文字以内',
        'under_name' => '10文字以内',
        'over_name_kana' => 'カタカナのみ、30文字以内',
        'under_name_kana' => 'カタカナのみ、30文字以内',
        'mail_address' => '100文字以内',
        'sex' => '必須項目です',
        'old_year' => '正しくありません',
        'old_month' => '正しくありません',
        'old_day' => '正しくありません',
        'role' => '必須項目です',
        'password' => '8文字以上20文字以内',
        ];
    }

}
