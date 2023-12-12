<?php

namespace App\Http\Controllers;
use File;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function index()
    {
        return view('signature');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function upload(Request $request)
    {
        $image_parts = explode(";base64,", $request->file);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = uniqid() . '.'.$image_type;
        file_put_contents('storage/tanda_tangan/'.$file, $image_base64);

        return back()->with('success', 'success Full upload signature');
    }
}
