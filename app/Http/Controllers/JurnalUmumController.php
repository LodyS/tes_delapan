<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class JurnalUmumController extends Controller
{
    public function index ()
    {
        $perkiraan = DB::table('perkiraan')->get(['id', 'nama']);
        $unit = DB::table('unit')->get(['id', 'code_cost_centre', 'nama']);

        dd($perkiraan);
        return view ('jurnal-umum', compact('perkiraan', 'unit'));
    }

    public function store (Request $request)
    {
        //dd(collect($request->input('debet')));
    }
}
