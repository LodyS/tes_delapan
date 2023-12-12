<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaryawanRequest extends FormRequest
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
            'first_name'=>'required',
            'dob'=>'required|date',
            'job_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'=>'Nama depan wajib diisi',
            'dob.required'=>'Tanggal lahir wajib diisi',
            'job_id'=>'Pekerjaan wajib diisi'
        ];
    }
}
