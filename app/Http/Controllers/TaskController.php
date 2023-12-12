<?php

namespace App\Http\Controllers;
use App\Models\Task;
use DB;
use Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $data = DB::table('tasks')->get();

        return view('task/task', compact('data'));
    }

    public function store(Request $request)
    {
        $insert = Task::create([
            'title'=>$request->title ?? '',
            'description'=>$request->description ?? '',
            'user_id'=>Auth::user()->id ?? '',
            'status'=>'New'
        ]);

        return response()->json($insert);
    }

    public function updateKolomDinamis(Request $request)
    {
        if(isset($request->value)):
            Task::where('id', $request->id)->update([$request->field=>$request->value]);
            echo 1;
        else:
            echo 0;
        endif;

        exit;        
    }

    public function done(Request $request)
    {
        $ids = $request->ids;
        Task::whereIn('id',explode(",",$ids))->update(['status'=>'Completed']);
        return response()->json(['success'=>"Task already updated"]);
    } 

    public function destroy (Request $request)
    {
        Task::where('id', $request->id)->delete();

        return response()->json(['success'=>"Delete Data Successfly."]);
    }
}
