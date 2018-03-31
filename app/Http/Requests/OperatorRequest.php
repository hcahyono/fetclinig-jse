<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperatorRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'phone' => 'required|numeric|min:11',
            'gender' => 'required|string|max:10',
        ];
    }

    public function messages()
    {
        $messages = [
            'name.required' => ':attribute harus di isi',
            'phone.required' => ':attribute harus di isi',
            'phone.min' => ':attribute minimal :min angka/number',
            'gender.required' => ':attribute harus di isi',
        ];

        return $messages;
    }

    public function attributes()
    {
        return [
            'name' => 'nama',
            'phone' => 'nomor handphone',
        ];
    }
}
