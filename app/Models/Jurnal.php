<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    public $timestamps = true;
    protected $table = "jurnal";
    protected $primaryKey = "id";
    public static $validasi = ['kode_jurnal'=>'required', 'tanggal_posting'=>'required'];
    protected $fillable = ['kode_jurnal', 'tanggal_posting','keterangan', 'id_tipe_jurnal','id_user', 'no_dokumen', 'flag_jurnal, flag_tutup_buku'];

    public function pk()
    {
        return $this->{$this->primaryKey};
    }
}
