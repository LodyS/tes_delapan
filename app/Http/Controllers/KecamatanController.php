<?php

namespace App\Http\Controllers;
use DB;
use App\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function jajal ()
    {
        $kecamatan = Kecamatan::with('kabupaten')->get();

        return view('kecamatan', compact('kecamatan'));
    }
}
