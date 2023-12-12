<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    protected $primaryKey = 'id';
    protected $fillable = ['kode', 'kabupaten'];
    public $timestamps = false;
}
