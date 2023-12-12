<?php

namespace App\Http\Controllers;
use DB;
use App\Job;
use App\Employee;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $pekerjaan = Job::get(['job_title', 'id']);
        $karyawan = Employee::first();

        return view('job/index', compact('pekerjaan', 'karyawan'));
    }

    public function store (Request $request)
    {
        foreach ($request->first_name as $job_id =>$first_name)
        {
            Employee::updateOrCreate(['job_id'=>$job_id], ['first_name'=>$first_name]);
        }

        return redirect('job/index');
    }

    public function table ()
    {
        $data = collect(DB::select('select first_name, last_name, job_title from employees left join job on job.id = employees.job_id'))->groupBy('job_title');
        return view('job/table', compact('data'));
    }
}
