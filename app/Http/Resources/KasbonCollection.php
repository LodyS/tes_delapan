<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class KasbonCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'=>$this->collection->map(function($data){
                return [
                    'tanggal_diajukan'=>date('YYYY-MM', strtotime($data->tanggal_diajukan)),
                    'tanggal_disetujui'=>date('YYYY-MM', strtotime($data->tanggal_disetujui)),
                    'pegawai'=>$data->pegawai,
                    'total_kasbon'=>number_format($data->total_kasbon),
                ];
            })
        ];
    }
}
