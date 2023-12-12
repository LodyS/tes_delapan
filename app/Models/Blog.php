<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'category',
        'description',
        'like',
        'dislike'
    ];

    public function getRouteKeyName()
    {
        return 'url';
    }
}
