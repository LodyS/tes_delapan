<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\SinyoTrait;
use App\Item;
use DB;

class ItemController extends Controller
{
    use SinyoTrait;

    public function update (Request $request)
    {
        $id = $request->id;

        Item::whereIn('id', explode(",",$id))->update(['status'=>'Y']);

        return response()->json(['success'=>'Item berhasil di update']);
    }
}
