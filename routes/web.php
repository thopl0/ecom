<?php

use App\Http\Controllers\CartController;
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
Route::get('/products', [SiteController::class,'getProducts'])->name('products');
Route::get('/category/{id}', [SiteController::class,'getCategoryProducts'])->name('category');



Auth::routes();
Route::group(["middleware" => "auth"], function () {
    Route::post('/addtocart', [CartController::class,'addItem'])->name('addToCart');
    Route::get('/payment', [EsewaController::class,'initiateEsewa'])->name('payment');
});

Route::group(["middleware" => ["auth","isAdmin"]], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/addproduct', [SiteController::class,'addProduct'])->name('addProduct');
    Route::get('/editproduct/{id}', [SiteController::class,'editProduct'])->name('editProduct');
    Route::get('/admin/products', [SiteController::class,'adminProducts'])->name('adminProducts');

    Route::post("/newproduct", [ProductController::class,"addProduct"])->name("newProduct");
    Route::post("/updateproduct", [ProductController::class,"updateProduct"])->name("updateProduct");
    Route::post("/deleteproduct/{id}", [ProductController::class,"deleteProduct"])->name("deleteProduct");

    Route::get("/addcategory", [SiteController::class,"addCategory"])->name("addCategory");
    Route::get("/editcategory/{id}", [SiteController::class,"editcategory"])->name("editCategory");
    Route::get("/admin/categories", [SiteController::class,"adminCategories"])->name("adminCategories");
    
    Route::post(("/newcategory"), [CategoryController::class,"addCategory"])->name("newCategory");
    Route::post("/updatecategory", [CategoryController::class,"updateCategory"])->name("updateCategory");
    Route::post("/deletecategory/{id}", [CategoryController::class,"deleteCategory"])->name("deleteCategory");

});




Route::get('/completetransaction', function () {
    $esewa = \Wslib\Esewa::init();
    $status = $esewa->validate('dafsfsfgdrdfbdfhg', 12);
    if ($status['status'] == "COMPLETE") {
        dd("complete");
    }
} );