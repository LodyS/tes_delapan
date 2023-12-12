<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //'nama'=>'required|string|max:10|unique:pegawai_api,nama,{$this->pegawai_id->nama}',
            'nama'=>'required|string|max:100|unique:pegawai_api,nama',
            'tanggal_masuk'=>'date|required|before_or_equal:'.date('Y-m-d'),
            'total_gaji'=>'required|integer|min:4000000|max:10000000',
        ];
    }
}
