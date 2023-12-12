<?php

namespace App\Http\Controllers\API;
use DB;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostBookRequest;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        // @TODO implement
        $data = Book::with(['authors', 'reviews'])->paginate(15);

        return BookResource::collection($data);
    }

    public function store(PostBookRequest $request)
    {
        // @TODO implement
        $book = new Book();
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->published_year = $request->published_year;
        $book->save();

        $bookAuthor = DB::table('book_author')->insert([
            'book_id'=>$book->id,
            'author_id'=>$request->authors
        ]);

        return new BookResource($book);
    }
}
