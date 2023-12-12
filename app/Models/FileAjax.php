<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileAjax extends Model
{
    protected $table = 'file_ajax';

    protected $fillable = ['foto', 'kampret'];
}
