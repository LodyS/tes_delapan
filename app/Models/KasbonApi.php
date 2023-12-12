<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasbonApi extends Model
{
    protected $table = 'kasbon_api';
    protected $primaryKey = 'id';
    protected $fillable = ['tanggal_diajukan', 'tanggal_disetujui', 'pegawai_id', 'total_kasbon'];
}
