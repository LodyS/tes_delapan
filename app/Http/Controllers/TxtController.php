<?php

namespace App\Http\Controllers;
use App\Txt;
use Illuminate\Http\Request;

class TxtController extends Controller
{
    public function index ()
    {
        $folder = public_path('txt/tes.txt');
        $open = fopen($folder,'r');
        while (!feof($open)) {

            $getTextLine = fgets($open);
            $explodeLine = explode(",",$getTextLine);

            list($name,$email) = $explodeLine;

            $txt = new Txt();
            $txt->name = $name;
            $txt->email = $email;
            $txt->save();
        }
        fclose($open);
    }

    public function create ()
    {
        return view('form-txt');
    }

    public function store (Request $request)
    {
        $act = new Txt;
        $act = $act->storeTxt($request);

        if ($act){
            echo 'Berhasil save';
        } else {
            echo 'Gagal save';
        }
    }
}
