<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PegawaiApi extends Model
{
    protected $table = "pegawai_api";
    protected $primaryKey = "id";
    protected $fillable = ['nama', 'tanggal_masuk', 'total_gaji'];

    protected $guarded = []; // add this
}
