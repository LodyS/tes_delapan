<?php

namespace App;
//use App\Kabupaten;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';
    protected $primaryKey = 'id';
    protected $fillable = ['job_title'];
    public $timestamps = false;

    public function karyawan ()
    {
        return $this->hasMany(Employee::class);
    }
}
