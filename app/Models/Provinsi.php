<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $primaryKey = 'id';
    protected $fillable = ['kode', 'provinsi'];
    public $timestamps = false;
}
