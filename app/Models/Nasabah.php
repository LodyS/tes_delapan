<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $table = 'nasabah';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_nasabah',
        'alamat_nasabah',
        'pekerjaan_nasabah',
        'penghasilan_nasabah'];
}
