<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class,'index'])->name('index');
Route::get('/product/{id}', [ProductController::class,'product'])->name('product');
Route::get('/test', function () {
    return view('addProduct')->with('categories', Category::all());
});



Auth::routes();
Route::group(["middleware" => "auth"], function () {
    Route::get('/payment', [EsewaController::class,'initiateEsewa'])->name('payment');
});

Route::group(["middleware" => "isAdmin"], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post("/addProduct", [ProductController::class,"addProduct"])->name("addProduct");
    Route::post(("/addCategory"), [CategoryController::class,"addCategory"])->name("addCategory");
});




Route::get('/completetransaction', function () {
    $esewa = \Wslib\Esewa::init();
    $status = $esewa->validate('dafsfsfgdrdfbdfhg', 12);
    if ($status['status'] == "COMPLETE") {
        dd("complete");
    }
} );