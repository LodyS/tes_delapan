<?php

namespace App\Http\Controllers;
use DB;
use File;
use DataTables;
use App\Models\Borak;
use Illuminate\Http\Request;

class BorakController extends Controller
{
    public function index()
    {
        if(request()->ajax()):

            return Datatables::of(DB::table('boraks')->select('*'))
            ->addColumn('action', function($row){

                $button = button_edit($row->id);
                $button .= button_delete($row->id);

                return $button;

            })
            ->addColumn('image', function($row){

                return image($row->image);
            })
            ->rawColumns(['action','image'])
            ->addIndexColumn()
            ->make(true);

        endif;

        return view('borak/index');
    }

    public function store(Request $request)
    {
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $productId = $request->product_id;

        $details = ['title' => $request->title, 'code' => $request->code, 'description' => $request->description];

        if ($files = $request->file('image')):

            //delete old file
            File::delete('public/borak/'.$request->hidden_image);

            //insert new file
            $destinationPath = 'public/borak/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $details['image'] = "$profileImage";

        endif;

        $borak =  Borak::updateOrCreate(['id' => $productId], $details);

        return response()->json($borak);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $borak  = Borak::where($where)->first();

        return response()->json($borak);
    }

    public function destroy(Request $request)
    {
        $data = Borak::where('id',$request->id)->first(['image']);
        \File::delete('public/borak/'.$data->image);
        $borak = Borak::where('id',$request->id)->delete();

        return response()->json($borak);
    }
}
