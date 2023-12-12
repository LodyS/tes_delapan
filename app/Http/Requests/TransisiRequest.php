<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransisiRequest extends FormRequest
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
            'nama'=>'required|string',
            'email'=>'required|unique:App\Companiet,email',
            'logo'=>'required|file',
            'website'=>'required|unique:App\Companiet,website'
        ];
    }

    public function messages ()
    {
        return [
            'nama.required'=>'Nama wajib diisi',
            'email.required'=>'Email wajib diisi dan harus unik',
            'logo.required'=>'Logo harus diisi dan file PNG',
            'website.required'=>'Website harus diisi dan harus unik'
        ];
    }
}
