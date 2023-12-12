<?php

namespace App;
//use App\Kabupaten;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id';
    protected $fillable = ['kode', 'kecamatan'];
    public $timestamps = false;

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten', 'id');
    }
}
