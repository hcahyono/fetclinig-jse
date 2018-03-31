<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PanduanRequest extends FormRequest
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
        $rules = [
            'judul' => 'required|string|max:100',
            'panduan' => 'required|string|',
        ];
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'judul.required' => ':attribute tidak boleh kosong',
            'panduan.required' => ':attribute tidak boleh kosong',
            'judul.max' => ':attribute maksimal :max karakter',
        ];

        return $messages;
    }

    public function attributes()
    {
        return [
            'judul' => 'judul panduan',
            'panduan' => 'isi panduan',
        ];
    }
}
