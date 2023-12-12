<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table ="employees";
    protected $primaryKey = 'id';
    protected $fillable =['first_name', 'last_name', 'dob', 'job_id'];
}
