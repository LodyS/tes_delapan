<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companiet extends Model
{
    protected $table = 'companiet';
    protected $primaryKey = "id";
    protected $fillable = ['nama', 'email', 'logo', 'website'];
}
