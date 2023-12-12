<?php

namespace App\Http\Controllers;
use App\Job;
use App\Employee;
use DB;
use App\Http\Requests\KaryawanRequest;
use Illuminate\Http\Request;

class PluckController extends Controller
{
    public function index ()
    {
        return view ('pluck/index', ['jobs'=> Job::pluck('job_title', 'id')]);
    }

    public function map ()
    {
        $array = [];
        $query = Job::get(['id', 'job_title']);

        $map = $query->map(function($items){
            $array['job_title'] = ($items->job_title == 'CEO') ? 'Direktur Halu' : $items->job_title;
            return $array;
        });

        return view('map', compact('map'));
    }

    public function store (KaryawanRequest $request)
    {
        DB::beginTransaction();

        try {
            Employee::create($request->all());
            DB::commit();
            return back()->with('success', 'Data Berhasil disimpan');
        } catch (\Illuminate\Database\QueryException $e){
            DB::rollback();
            return back()->withError('Gagal simpan data');
        }
    }
}
