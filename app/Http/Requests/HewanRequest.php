<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HewanRequest extends FormRequest
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
            'namahewan' => 'required|string|max:100',
            'jenishewan' => 'required|string|max:100',
            'genderhewan' => 'required|string',
            'rashewan' => 'max:100',
            'warnabulu' => 'max:100',
        ];
    }

    public function messages()
    {
        return [
            'namahewan.required' => ':attribute harus diisi',
            'jenishewan.required' => ':attribute harus diisi',
            'genderhewan.required' => ':attribute harus diisi',

            'namahewan.string' => ':attribute harus berupa karakter huruf',
            'jenishewan.string' => ':attribute harus berupa karakter huruf',
            'genderhewan.string' => ':attribute harus berupa karakter huruf',

            'namahewan.max' => ':attribute maksimal',
            'jenishewan.max' => ':attribute maksimal',
            'rashewan.max' => ':attribute maksimal',
        ];
    }

    public function attributes()
    {
        return [
            'namahewan' => 'Nama hewan',
            'jenishewan' => 'Jenis hewan',
            'genderhewan' => 'Jenis kelamin hewan',
            'rashewan' => 'Ras hewan',
            'warnabulu' => 'Warna hewan',
        ];
    }
}
