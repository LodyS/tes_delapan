<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use DataTables;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()):

            $data = Produk::query();

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '<input type="checkbox" class="sub_chk" data-id="'.$row->id.'">';
            })
            ->addColumn('status', function($row){
                return ($row->status == 'Y') ? 'Lunas' : 'Belum Lunas';
            })
            ->rawColumns(['action'])
            ->make(true);

        endif;

        return view('produk/index');
    }

    public function update(Request $request)
    {
        $ids = $request->ids;
        Produk::whereIn('id',explode(",",$ids))->update(['status'=>$request->status]);
        return response()->json(['success'=>"Produk berhasil di update."]);
    }
}
