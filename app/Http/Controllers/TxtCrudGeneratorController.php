<?php

namespace App\Http\Controllers;

use App\Txt;
use Illuminate\Http\Request;

class TxtCrudGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $txts = Txt::all();

        return view('txts.index', compact('txts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('txts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Txt::create($request->all());

        return back()->with('message', 'item stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Txt $txt
     * @return \Illuminate\Http\Response
     */
    public function show(Txt $txt)
    {
        return view('txts.show', compact('txt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Txt $txt
     * @return \Illuminate\Http\Response
     */
    public function edit(Txt $txt)
    {
        return view('txts.edit', compact('txt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Txt $txt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Txt $txt)
    {
        $txt->update($request->all());

        return back()->with('message', 'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Txt $txt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Txt $txt)
    {
        $txt->delete();

        return back()->with('message', 'item deleted successfully');
    }
}
