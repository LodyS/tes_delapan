<?php

namespace App\Http\Controllers;
use Maulana20\GojekID;
use Illuminate\Http\Request;

class GojekController extends Controller
{
    public function loginHp()
    {
        $gojek = new GojekID();
        $gojek_token = $gojek->loginPhone('085747009492')->getLoginToken();

        return $gojek_token;
    }
}
