<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizApi extends Model
{
    protected $table = 'quiz_api';
    protected $fillable = [
        'queztion',
        'answer_a',
        'answer_b',
        'answer_c',
        'answer_d'
    ];
}
