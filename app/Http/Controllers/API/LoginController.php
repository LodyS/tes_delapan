<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()):
            return response()->json(['error'=>$validator->errors()], 401);
        endif;

        $user = User::where('email', $request->email)->first();

        if ($request->email == $user->email && $request->password == $user->password):
            return response()->json(['status' => 'Authorised', 'token'=>$user->api_token], 200);
        else:
            return response()->json(['status'=>'false'], 401);
        endif;
    }
}
