<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        return view('blogs/index');
    }

    public function getBlogs(Request $request)
    {
        $blogs = Blog::get();

        return response()->json($blogs);
    }

    public function indeks(Request $request)
    {
        $blogs = Blog::latest()->get();
        return view('blogs/beranda', compact('blogs'));
    }

    public function blogDetail(Blog $url)
    {
        return view('blogs/detail', ['blog'=>$url]);
    }

    public function fetchLike(Request $request)
    {
        $blog = Blog::find($request->blog);
        return response()->json(['blog'=>$blog]);
    }

    public function handleLike(Request $request)
    {
        $blog = Blog::find($request->blog);
        $value = $blog->like;

        $blog->like =$value+1;
        $blog->save();

        return response()->json(['message'=>'Liked']);
    }

    public function fetchDislike(Request $request)
    {
        $blog = Blog::find($request->blog);

        return response()->json(['blog'=>$blog]);
    }

    public function handleDislike(Request $request)
    {
        $blog = Blog::find($request->blog);
        $value = $blog->dislike;

        $blog->dislike = $value+1;
        $blog->save();

        return response()->json(['message'=>'disliked']);
    }

    public function search()
    {   
        return view('blogs/search');
    }

    public function searchData(Request $request)
    {
        $posts= Blog::where('title','like', '%'.$request->keywords.'%')->get();
        return response()->json($posts);
    }

    public function datatabel(Request $request)
    {
        return view('blogs/datatable');
    }
}
