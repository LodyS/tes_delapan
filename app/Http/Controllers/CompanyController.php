<?php

namespace App\Http\Controllers;
use App\Company;
//use Job;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $data = Company::get(['id','name']);

        return view('company', compact('data'));
    }

    public function store (Request $request)
    {
        foreach ($request->name as $id =>$i)
        {
            Company::updateOrCreate(['id'=>$id], ['name'=>$i]);
        }

        return redirect('company');
    }
}
