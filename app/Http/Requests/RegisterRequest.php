<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $telepon = $this->telepon != NULL ? 'min:7|numeric' : '';
        $rules =  [
            'nama' => 'required|string|max:100',
            'gender' => 'required|string',
            'telepon' => $telepon,
            'handphone' => 'required|numeric|min:11',
            'alamat' => 'required|string|min:10|max:120',
            'namahewan' => 'required|string|max:100',
            'jenishewan' => 'required|string|max:100',
            'genderhewan' => 'required|string',
            'rashewan' => 'max:100',
            'warnabulu' => 'max:100',
        ];
        return $rules;
    }

    //custom pesan error
    public function messages()
    {
        return [
            'nama.required' => ':attribute Harus diisi',
            'gender.required' => ':attribute Harus diisi',
            'handphone.required' => ':attribute Harus diisi',
            'alamat.required' => ':attribute Harus diisi',
            'namahewan.required' => ':attribute Harus diisi',
            'jenishewan.required' => ':attribute Harus diisi',
            'genderhewan.required' => ':attribute Harus diisi',

            'nama.string' => ':attribute Harus berupa karakter huruf',
            'gender.string' => ':attribute Harus berupa karakter huruf',
            'alamat.string' => ':attribute Harus berupa karakter huruf',
            'namahewan.string' => ':attribute Harus berupa karakter huruf',
            'jenishewan.string' => ':attribute Harus berupa karakter huruf',
            'genderhewan.string' => ':attribute Harus berupa karakter huruf',

            'nama.max' => ':attribute Maksimal',
            'alamat.max' => ':attribute Maksimal',
            'namahewan.max' => ':attribute Maksimal',
            'jenishewan.max' => ':attribute Maksimal',
            'rashewan.max' => ':attribute Maksimal',

            'telepon.min' => ':attribute Minimal',
            'handphone.min' => ':attribute Minimal',

            'telepon.numeric' => ':attribute Harus angka',
            'handphone.numeric' => ':attribute Harus angka',
        ];
    }

    //custom nama attribute yang error
    public function attributes()
    {
        return [
            'nama' => 'Nama pasien',
            'telepon' => 'Nomor telepon',
            'handphone' => 'Nomor handphone',
            'namahewan' => 'Nama hewan',
            'jenishewan' => 'Jenis hewan',
            'genderhewan' => 'Jenis kelamin hewan',
            'rashewan' => 'Ras hewan',
            'warnabulu' => 'Warna hewan',
        ];
    }
}
