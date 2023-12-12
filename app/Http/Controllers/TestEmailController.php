<?php

namespace App\Http\Controllers;
use App\Jobs\TestSendEmail;
use Illuminate\Http\Request;

class TestEmailController extends Controller
{
    public function sendEmail()
    {
        $emailJobs = new TestSendEmail();
        $this->dispatch($emailJobs);
    }
}
