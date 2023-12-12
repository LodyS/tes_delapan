<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'isbn',
        'title',
        'description',
        'published_year'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    public function book_author()
    {
        return $this->hasMany('App\Models\BookAuthor', 'book_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\BookReview', 'book_id', 'id');
    }
}
