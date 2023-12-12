<?php

namespace App\Http\Controllers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Views;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function form()
    {
        if(View::exists('auth.register')):
            return view('auth.register');
        endif;
    }

    public function processSignup(Request $request)
    {
        $this->validate($request, [
            'username'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed|min:6'
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->email = strtolower($request->email);
        $user->password = $request->password;
        $user->save();

        return response()->json(['success'=>true, 'message'=>'Registrasi selesai']);
    }
}
