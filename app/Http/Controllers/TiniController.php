<?php

namespace App\Http\Controllers;
use App\Models\Kaset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TiniController extends Controller
{
    public function index()
    {
        $data = Kaset::latest()->first();
        return view('tini', compact('data'));
    }

    public function upload (Request $request)
    {

        $fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location'=>"/storage/$path"]);
    }

    public function store (Request $request)
    {
        //dd($request->all());
        Kaset::create([
            'lagu'=>$request->input('lagu')
        ]);
        return back();
    }
}
