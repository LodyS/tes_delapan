<?php

namespace App\Http\Controllers;
use App\Jobs\JajalQueue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index()
    {
        JajalQueue::dispatch()->delay(now()->addMinutes(5));

        return 'Berhasil';
    }
}
