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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "fullname" => "required|string",
            "gender" => "required",
	        "email" => "required|email",
            "postcode" => "required|char|max:8",
            "address" => "required|string",
            "opinion" => "required|string|max:120"
        ];
    }

    public function attributes()
    {
        return [
            'fullname' => 'お名前',
            'gender' => '性別',
            'email' => 'メールアドレス',
            'postcode' => '郵便番号',
            'address' => '住所',
            'opinion' => 'ご意見'
        ];
    }

    public function messages(){
        return [
            'fullname.required' => 'attribute は必須です',
            'gender.required'       => 'attribute は必須です',
            'email.email'       => 'attribute はメールアドレス形式である必要があります。',
            'email.required' => 'attribute は必須です',
            'postcode.required'=> 'attribute は必須です',
            'address.required' => 'attribute は必須です',
            'opinion.required'     => 'attribute は必須です',
            'opinion.max' => 'attribute は120文字以内で入力して下さい'
        ];
    }
}
