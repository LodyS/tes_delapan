<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PegawaiCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'=>$this->collection->map(function($data){
                return [
                    'id'=>$data->id,
                    'nama'=>strtoupper(strtok($data->nama, ' ')),
                    'tanggal_masuk'=>date('d-m-Y', strtotime($data->tanggal_masuk)),
                    'total_gaji'=>'Rp '.number_format($data->total_gaji),
                    'href'=>[
                        'link'=>route('pegawai.show', $data->id),
                    ],
                ];
            })
        ];
    }
}
