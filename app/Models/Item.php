<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable = ['transaction_number', 'date', 'item_number', 'desc', 'variant_code', 'quantity', 'cost', 'status'];
    protected $cast= ['status'=>'boolean'];
}
