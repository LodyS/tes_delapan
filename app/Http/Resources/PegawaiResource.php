<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PegawaiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'nama'=>$this->nama,
            'tanggal_masuk'=>date('d-m-Y', strtotime($this->tanggal_masuk)),
            'total_gaji'=>'Rp '.number_format($this->total_gaji),
        ];
        //return parent::toArray($request);
    }
}
