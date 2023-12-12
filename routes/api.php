<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// l7
/*Route::post('login', 'LoginController@login');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
  //  return $request->user();

    Route::get('/books', 'API\BooksController@index');
    Route::post('/books', 'API\BooksController@store')->middleware('auth.admin');
    Route::post('/books/{id}/reviews', 'API\BooksReviewController@store')->middleware('auth.admin');
    Route::delete('/books/{bookId}/reviews/{reviewId}', 'API\BooksReviewController@destroy')->middleware('auth.admin');
//});


Route::resource('pegawai', 'API\PegawaiController')->middleware("throttle:5");;
Route::resource('kasbon', 'API\KasbonController');
Route::patch('setuju-kasbon/{id}', 'API\KasbonController@setuju');
Route::post('setuju-masal', 'API\KasbonController@setujuMasal'); */