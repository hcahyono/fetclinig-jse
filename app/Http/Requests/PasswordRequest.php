<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password' => 'required|min:6',
            'passwordbaru' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        $messages = [
            'password.required' => ':attribute harus di isi',
            'password.min' => ':attribute minimal :min karakter',
            'passwordbaru.confirmed' => 'konfirmasi :attribute tidak cocok',
            'passwordbaru.min' => ':attribute minimal :min karakter',
        ];

        return $messages;
    }

    public function attributes()
    {
        return [
            'password' => 'password lama',
            'passwordbaru' => 'password baru',
            'passwordbaru_confirmation' => 'password konfirmasi',
        ];
    }
}
