<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => ['required', 'string', 'mas:255'],
            'first_name' => ['required', 'string', 'mas:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'mas:255'],
            'tel_area_code' => ['required', 'numeric, digits_between:1,5'],
            'tel_local_number' => ['required', 'numeric', 'digits_between:1,5'],
            'tel_sub_number' => ['required', 'numeric', 'digits_between:1,5'],
            'address' => ['required', 'string', 'max:255'],
            'building' => ['nullable', 'string', 'mas:255'],
            'inquiry_type' => ['required'],
            'details' => ['required', 'string', 'max:120'],
            'password' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel_area_code.digits_between:1,5' => '電話番号は5桁までの数字で入力してください',
            'tel_local_number.digits_between:1,5' => '電話番号は5桁までの数字で入力してください',
            'tel_sub_number.digits_between:1,5' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'inquiry_type.required' => 'お問い合わせの種類を選択してください',
            'details.required' => 'お問い合わせ内容を入力してください',
            'details.max:255' => 'お問い合わせ内容は120文字以内で入力してください',
            'password.required' => 'パスワードを入力してください',
            'name' => 'お名前を入力してください',
        ];
    }
}
