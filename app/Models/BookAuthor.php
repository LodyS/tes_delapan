<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    protected $table = 'book_author';
    protected $fillable = ['book_id', 'author_id'];
}
