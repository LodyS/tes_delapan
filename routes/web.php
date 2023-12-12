<?php
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\GojekController;
use App\Http\Controllers\DataTableAjaxCRUDController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('navigasi', function () {
    return view('navigasi');
});

Route::get('form-wizard-vue', function () {
    return view('form-wizard');
});


Route::get('calender', [CalendarController::class, 'index']);
Route::get('show-events', [CalendarController::class, 'calendarEvents']);

Route::get('blog', [BlogController::class, 'index']);
Route::get('data-blog', [BlogController::class, 'getBlogs']);

Route::get('blog-search', [BlogController::class, 'search']);
Route::get('blog-data-search', [BlogController::class, 'searchData']);

Route::get('/blogs', [BlogController::class, 'indeks']);
Route::get('/blogs/{url?}', [BlogController::class, 'blogDetail'])->name('blogs');
Route::get('datatabel-blog', [BlogController::class, 'datatabel']);

Route::post('/like', [BlogController::class, 'fetchLike']);
Route::post('/like/{id}', [BlogController::class, 'handleLike']);
 
Route::post('/dislike', [BlogController::class, 'fetchDislike']);
Route::post('/dislike/{id}', [BlogController::class, 'handleDislike']);

Route::get('/produk', [ProductController::class, 'index']);
Route::get('/data-produk', [ProductController::class, 'fetchProducts']);

Route::get('country', [DropdownController::class, 'country']);
Route::get('state', [DropdownController::class, 'state']);
Route::get('city', [DropdownController::class, 'city']);

Route::get('login-hp', [GojekController::class, 'loginHp']);

// l7 riset

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('ajax-crud-datatable', [DataTableAjaxCRUDController::class, 'index']);
Route::post('ajax-crud-datatable', [DataTableAjaxCRUDController::class, 'index']);
Route::post('store-company', [DataTableAjaxCRUDController::class, 'store']);
Route::post('edit-company', [DataTableAjaxCRUDController::class, 'edit']);
Route::post('delete-company', [DataTableAjaxCRUDController::class, 'destroy']);

Route::get('produk-cekbok', [ProdukController::class, 'index']);
Route::get('update-produk', [ProdukController::class, 'update']);

Route::get('signature', [SignatureController::class, 'index']);
Route::post('signaturepad', [SignatureController::class, 'upload'])->name('signaturepad.upload');


Route::get('task', [TaskController::class, 'index']);
Route::post('store-task', [TaskController::class, 'store']);
Route::get('task-done', [TaskController::class, 'done']);
Route::post('update-task', [TaskController::class, 'updateKolomDinamis']);
Route::post('delete-task', [TaskController::class, 'destroy']);

/*
Route::get('kecamatan', 'KecamatanController@jajal');

Route::get('item/subtotal', 'ItemController@subTotal');
//Route::get('item/total', 'ItemController@total');
Route::get('item/main', 'ItemController@main');

Route::get('item/index', 'ItemController@index');
Route::post('/update-item', 'ItemController@update');

Route::get('line-chart', 'ChartController@show');

Route::get('job/index', 'JobController@index');
Route::get('job/table', 'JobController@table');


//Route::resource('posts','PostController');
Route::get('form-checkbox', 'PostController@create');
Route::get('nang-sinyo', 'PostController@index');
Route::post('/simpan-checkbox', 'PostController@store');

Route::get('browser-usage', 'BrowserController@index');

Route::get('produk/index', 'ProdukController@index');
Route::post('update-produk', 'ProdukController@update');

Route::get('kirim-email', 'TestEmailController@sendEmail');

Route::get('sinyo-email', function(){

	$details['email'] = 'lodyjay@gmail.com';

    dispatch(new App\Jobs\TestSendEmail($details));

    dd('done');
});

Route::get('company', 'CompanyController@index');
Route::post('/simpan-update', 'CompanyController@store');

Route::post('/simpan-update-karyawan', 'JobController@store');

Route::get('fetch', 'QuizApiController@fetch');

Route::get('menu/index', 'MenuController@getMenu');
Route::get('pluck/index', 'PluckController@index');
Route::get('map', 'PluckController@map');
Route::post('/simpan-pluck', 'PluckController@store');

Route::resource('transisi', 'TransisiController');
//Route::get('edit-transisi/{id}', 'TransisiController@edit')->name('edit-transisi');

Route::get('vue-satu', function(){
    return view('vue/satu');
});

Route::get('jajal-queue', 'QueueController@index');
Route::get('pinjaman/nasabah', 'PinjamanNasabahController@nasabah');
Route::get('pinjaman/pinjaman-berjalan/{id}', 'PinjamanNasabahController@pinjaman');
Route::get('pinjaman/anuitas/{id}', 'PinjamanNasabahController@anuitas');

Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});

Route::get('notifikasi', function () {
    return view('notifikasi');
});

Route::get('jurnal-umum', 'JurnalUmumController@index');
Route::post('simpan-jurnal-umum', 'JurnalUmumController@store');

Route::get('test-txt', 'TxtController@index');
Route::get('form-txt', 'TxtController@create');
Route::post('simpan-txt', 'TxtController@store');

Route::resource('ancin/ancin', 'PapaAncinController');

Route::get('ocr', 'OcrController@upload')->name('upload');
Route::get('ocr/test', 'OcrController@test');

Route::get('tini', 'TiniController@index');
Route::post('tini-store', 'TiniController@store');
Route::post('/upload', 'TiniController@upload');

Route::get('image', 'FileAjaxController@index')->name('image');
Route::post('image', 'FileAjaxController@store')->name('image');


Route::get('borak', 'BorakController@index');
Route::get('borak/{id}/edit', 'BorakController@edit');
Route::post('borak-store', 'BorakController@store');
Route::post('borak-delete', 'BorakController@destroy');

Route::get('crop-image', 'CropImageController@index');
Route::post('crop-image-upload ', 'CropImageController@uploadCropImage');

// user online
Route::get('last-seen', 'UserController@userOnlineStatus');

Route::get('scrolling', 'ScrollingController@index');

Route::get('progress-bar', 'DocController@index');
Route::post('store-file', 'DocController@store');

Route::post('upload-controller', 'FileAjaxController@upload');

Route::get('folder', function(){
    return view('upload-controller');
});
*/