<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('nang-sinyo',compact('posts'));
    }

    public function create()
    {
        return view('form-checkbox');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['category'] = $request->input('category');

        Post::create($input);

        return redirect('nang-sinyo');
    }
}
