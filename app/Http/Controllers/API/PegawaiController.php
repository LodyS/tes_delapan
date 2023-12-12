<?php

namespace App\Http\Controllers\API;
use App\PegawaiApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PegawaiCollection;
use App\Http\Resources\PegawaiResource;
use App\Http\Requests\PegawaiApiRequest;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = PegawaiApi::paginate(10);

        return new PegawaiCollection($data);
    }

    public function show ($id)
    {
        $data = PegawaiApi::findOrFail($id);

        return response()->json([new PegawaiResource($data)]);
    }

    public function store(PegawaiApiRequest $request)
    {
        $data = PegawaiApi::create($request->all());

        return response()->json(['pesan'=>'Berhasil disimpan']);
    }

    public function update (Request $request, $id)
    {
        $data = PegawaiApi::where('id', $id)->update($request->all());

        return response()->json(['data berhasil di update']);
    }
}
