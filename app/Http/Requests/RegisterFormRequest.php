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

     public function getValidatorInstance()
    {
        $old_year=$this->input('old_year');
        $old_month=$this->input('old_month');
        $old_day=$this->input('old_day');
        $datetime_validation = $old_year . '-' . $old_month . '-' . $old_day;
        // rules()に渡す値を追加でセット
        //     これで、この場で作った変数にもバリデーションを設定できるようになる
        $this->merge([
            'datetime_validation' => $datetime_validation,
        ]);

        return parent::getValidatorInstance();
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
        'over_name_kana' => 'required|string|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u|max:30',
        'under_name_kana' => 'required|string|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u|max:30',
        'mail_address' => 'required|email|unique:users|max:100',
        'sex' => 'required|in:1,2,3',
        'datetime_validation' => 'required|after:1999-12-31|before:today|date',
        'role' => 'required|in:1,2,3,4',
        'password' => 'required|min:8|max:20|confirmed',
        ];
    }

    public function messages(){
        return [
        'over_name.required' => '必須項目です',
        'over_name.string' => '文字のみ',
        'over_name.max' => '10文字以内',
        'under_name.required' => '必須項目です',
        'under_name.string' => '文字のみ',
        'under_name.max' => '10文字以内',
        'over_name_kana.required' => '必須項目です',
        'over_name_kana.string' => '文字のみ',
        'over_name_kana.regex' => 'カタカナのみ',
        'over_name_kana.max' => '30文字以内',
        'under_name_kana.required' => '必須項目です',
        'under_name_kana.string' => '文字のみ',
        'under_name_kana.regex' => 'カタカナのみ',
        'under_name_kana.max' => '30文字以内',
        'mail_address.required' => '必須項目です',
        'mail_address.email' => '形式が正しくありません',
        'mail_address.unique' => '既に登録されているアドレスは使えません',
        'mail_address.max' => '100文字以内',
        'sex' => '必須項目です',
        'datetime_validation.required' => '必須項目です',
        'datetime_validation.after' => '2000年1月1日以降で設定してください',
        'datetime_validation.before' => '今日以降の日付は設定出来ません',
        'datetime_validation.date' => '日付が正しくありません',
        'role' => '必須項目です',
        'password.required' => '必須項目です',
        'password.min' => '8文字以上',
        'password.max' => '20文字以内',
        'password.confirmed' => '入力したパスワードと違います',
        ];
    }

}
