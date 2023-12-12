<?php

namespace App\Http\Controllers;
use App\Models\FileAjax;

use Illuminate\Http\Request;

class FileAjaxController extends Controller
{
    public function index()
    {
        return view('upload-ajax');
    }

    public function store(Request $request)
    {
        $foto = $request->foto->extension();
        $request->foto->move(public_path('uploads'), $foto);

        $kampret = $request->kampret->extension();
        $request->kampret->move(public_path('uploads'), $kampret);

        $data = FileAjax::create([
            'foto'=> $foto,
            'kampret'=>$kampret
        ]);

        if ($data):
            return response()->json(['status'=>'success', 'data'=>$data, 'message'=>'Success! image(s) uploaded']);
        else:
            return response()->json(['status'=>'failed', 'data'=>$data, 'message'=>'Failed! image(s) not uploaded']);
        endif;
    }

    public function upload(Request $request)
    {
        $file = $request->file->getClientOriginalName();
        $request->file->move(app_path('Http\Controllers'), $file);

        if ($file):
            return back()->with('success', 'Berhasil upload');
        else:
            return back()->with('danger', 'Gagal upload');
        endif;
    }
}
