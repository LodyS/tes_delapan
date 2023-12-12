<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WildLifePopulations extends Model
{
    protected $table = 'wild_life_populations';
    protected $fillable = ['bears', 'dolphins'];
}
