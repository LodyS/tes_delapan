<?php

namespace App\Http\Controllers;
use App\PegawaiApi;
use Illuminate\Http\Request;

class ScrollingController extends Controller
{
    public function index(Request $request)
    {
        $pegawai = PegawaiApi::paginate(20);
           
        return view('lazy-loading', compact('pegawai'));
    }
}
