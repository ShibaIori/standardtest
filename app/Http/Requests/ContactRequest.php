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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|size:8|alpha_dash',
            'address' => 'required',
            'opinion' => 'required|max:120',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => '名字を入力してください',
            'lastname.required' => '名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'address.required' => '住所を入力してください',
            'registered_at.date' => '日付の形式で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max:120' => 'ご意見は120文字以内にしてください',
        ];
    }
}
