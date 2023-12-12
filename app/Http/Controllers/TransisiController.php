<?php

namespace App\Http\Controllers;
use App\Companiet;
use DB;
use App\Http\Requests\TransisiRequest;
use Illuminate\Http\Request;

class TransisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companiet = Companiet::tobase()->get(['id', 'nama', 'email', 'logo', 'website']);

        return view('transisi.index', compact('companiet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransisiRequest $request)
    {
        DB::beginTransaction();

        try {

            $logo = $request->file('logo');
            $logoo = time()."_".$logo->getClientOriginalName();
            $folder = "storage";
            $logo->move($folder, $logoo);

            $transisi = new Companiet;
            $transisi->nama = $request->nama;
            $transisi->email = $request->email;
            $transisi->logo = $logoo;
            $transisi->website = $request->website;
            $transisi->save();

            DB::commit();
            return back()->with('success', 'Data Berhasil disimpan');
        } catch (\Illuminate\Database\QueryException $e){
            DB::rollback();
            return back()->withError('Gagal simpan data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Companiet::find($id);

        return view('transisi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        echo Input::get('nama');
        //if($request->cek_logo)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
