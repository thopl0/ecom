<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;

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
    foreach(Product::all() as $product){
        $product->category = Category::find($product->category_id);
        echo $product;
    }
});



Auth::routes();
Route::group(["middleware" => "auth"], function () {
    Route::get('/payment', [EsewaController::class,'initiateEsewa'])->name('payment');
});

Route::group(["middleware" => "isAdmin"], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/addproduct', [SiteController::class,'addProduct'])->name('addProduct');
    Route::get('/editproduct/{id}', [SiteController::class,'editProduct'])->name('editProduct');
    Route::post("/newproduct", [ProductController::class,"addProduct"])->name("newProduct");
    Route::post("/updateproduct", [ProductController::class,"updateProduct"])->name("updateProduct");
    Route::get("/addcategory", [SiteController::class,"addCategory"])->name("addCategory");
    Route::get("/editcategory/{id}", [SiteController::class,"editcategory"])->name("editCategory");
    Route::post(("/newcategory"), [CategoryController::class,"addCategory"])->name("newCategory");
    Route::post("/updatecategory", [CategoryController::class,"updateCategory"])->name("updateCategory");
});




Route::get('/completetransaction', function () {
    $esewa = \Wslib\Esewa::init();
    $status = $esewa->validate('dafsfsfgdrdfbdfhg', 12);
    if ($status['status'] == "COMPLETE") {
        dd("complete");
    }
} );