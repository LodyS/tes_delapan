<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PinjamanNasabah extends Model
{
    protected $table = 'pinjaman_nasabah';
    protected $primaryKey = 'id';
    protected $fillable = ['nasabah_id', 'total_pinjaman', 'tanggal_disetujui', 'status', 'tenor'];
    protected $dates = ['tanggal_disetujui'];
}
