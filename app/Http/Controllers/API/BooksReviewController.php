<?php

namespace App\Http\Controllers;
use Auth;
use App\BookReview;
use App\Http\Requests\PostBookReviewRequest;
use App\Http\Resources\BookReviewResource;
use Illuminate\Http\Request;

class BooksReviewController extends Controller
{
    public function __construct()
    {

    }

    public function store(int $bookId, PostBookReviewRequest $request)
    {
        // @TODO implement
        $bookReview = new BookReview();
        $bookReview->book_id = $bookId;
        $bookReview->review = $request->review;
        $bookReview->comment = $request->comment;
        $bookReview->user_id =auth()->user()->id;
        $bookReview->save();
        //$user_id =

        return new BookReviewResource($bookReview);
    }

    public function destroy(int $bookId, int $reviewId, Request $request)
    {
        // @TODO implement
        if(auth()->user()->is_admin ==1):
            BookReview::where('book_id', $bookId)->where('review_id', $reviewId)->delete();
            return response()->json(['status'=>'Review deleted']);
        else:
            return response()->json(['status'=>'Is not admin', 403]);
        endif;
    }
}
