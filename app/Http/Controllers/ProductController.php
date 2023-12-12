<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('infinite-scroll/index');
    }

    public function fetchProducts()
    {
        $data = Product::orderBy('id')->paginate(5);

        return response()->json($data);
    }
}
