<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasienRequest extends FormRequest
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
        $rules = [
            'nama' => 'required|string|max:255',
            'gender' => 'required|string',
            'tempatlahir' => 'required|string',
            'tanggallahir' => 'required|date',
            'telepon' => $telepon,
            'handphone' => 'required|numeric|min:11',
            'alamat' => 'required|string|min:10|max:255',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'nama.required' => 'wajib diisi',
            'gender.required' => 'wajib diisi',
            'tempatlahir.required' => 'wajib diisi',
            'tanggallahir.required' => 'wajib diisi',
            'handphone.required' => 'wajib diisi',
            'alamat.required' => 'wajib diisi',

            'nama.string' => 'harus berupa karakter huruf',
            'gender.string' => 'harus berupa karakter huruf',
            'tempatlahir.string' => 'harus berupa karakter huruf',
            'alamat.string' => 'harus berupa karakter huruf',

            'handphone.numeric' => 'harus berupa angka',
            'telepon.numeric' => 'harus berupa angka',

            'tanggallahir.date' => 'harus format tanggal yang sesuai',
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama pemilik',
            'gender' => 'Gender pemilik',
            'tanggallahir' => 'Tanggal Lahir',
            'tempatlahir' => 'Tempat',
            'telepon' => 'Nomor telepon',
            'handphone' => 'Nomor handphone',
        ];
    }
}
