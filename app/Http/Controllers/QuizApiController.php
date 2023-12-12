<?php

namespace App\Http\Controllers;
use App\QuizApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuizApiController extends Controller
{
    public function fetch ()
    {
        $response = Http::get('https://quizapi.io/api/v1/questions', [
            'apiKey' => 'zLsqLBwy3kpPcGVfaQEHsnflH8fQn2B6JR0iB678',
            'limit'  => 50,
        ]);

        $quiz = json_decode($response->body());

        foreach ($quiz as $q)
        {
            $kuis = new QuizApi;
            $kuis->question = $q->question;
            $kuis->answer_a = $q->answers->answer_a;
            $kuis->answer_b = $q->answers->answer_b;
            $kuis->answer_c = $q->answers->answer_c;
            $kuis->answer_d = $q->answers->answer_d;
            $kuis->save();
        }

        return 'Berhasil import data API';
    }
}
