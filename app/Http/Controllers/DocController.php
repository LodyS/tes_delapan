<?php

namespace App\Http\Controllers;
use App\Doc;
use Illuminate\Http\Request;

class DocController extends Controller
{
    public function index()
    {
        return view('upload-file-bar');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
 
        $title = time().'.'.request()->file->getClientOriginalExtension();
  
        $request->file->move(public_path('docs'), $title);
 
        $storeFile = new Doc;
        $storeFile->title = $title;
        $storeFile->save();
  
        return response()->json(['success'=>'File Uploaded Successfully']);
    }
}
