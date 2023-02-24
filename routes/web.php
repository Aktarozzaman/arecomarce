<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect', [HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/view_catagory', [AdminController::class,'view_catagory']);
Route::post('/add_catagory', [AdminController::class,'add_catagory']);
Route::get('/delete_catagory/{id}', [AdminController::class,'delete_catagory']);
Route::get('/add_product', [AdminController::class,'add_product']);
Route::post('/addproduct', [AdminController::class,'addproduct']);
Route::post('/add_product', [AdminController::class,'test']);
Route::get('/view_product', [AdminController::class,'view_product']);
Route::get('/delete_product/{id}', [AdminController::class,'delete_product']);
Route::get('/update_product/{id}', [AdminController::class,'updateproduct']);
Route::post('/update/product/{id}', [AdminController::class,'storeproduct']);
Route::get('/order', [AdminController::class,'order']);
Route::get('/delivered/{id}', [AdminController::class,'delivered']);
Route::get('/delivered/delete/{id}', [AdminController::class,'deletep']);
Route::get('/print_pdf/{id}', [AdminController::class,'print']);
Route::get('/send_email/{id}', [AdminController::class,'sendmail']);
Route::post('/send_user_email/{id}', [AdminController::class,'send_user_email']);
Route::get('/search', [AdminController::class,'search']);


Route::get('/product_details/{id}', [HomeController::class,'productdetails']);
Route::post('/add_cart/{id}', [HomeController::class,'addcart']);
Route::get('/show_cart', [HomeController::class,'showcart']);
Route::get('/remove_cart/{id}', [HomeController::class,'removecart']);
route::get('/cash/order',[HomeController::class,'cash_order']);
route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');
route::get('/show_order',[HomeController::class,'show_order']);
route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);
route::post('/add_comment',[HomeController::class,'add_comment']);
route::get('/product_search',[HomeController::class,'product_search']);
route::get('/all_product',[HomeController::class,'all_product']);
route::get('/search_product',[HomeController::class,'search_product']);









