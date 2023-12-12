<?php

namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Cache;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userOnlineStatus()
    {
        $users = User::all();

        return view('last-seen/index', compact('users'));
    }
}
