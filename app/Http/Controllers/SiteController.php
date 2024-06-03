<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SiteController extends Controller
{
    //
    
    public function index(Request $request)
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->category = Category::find($product->category_id);
        }
        $categories = Category::all();
        return view("welcome")->with("products", $products)->with('categories', $categories);
    }

    public function addProduct()
    {
        return view("addProduct")->with("categories", Category::all());
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        if(empty($product)) {
            return redirect()->back()->with("error","Product not found");
        }
        $product->category = Category::find($product->category_id);
        
        return view("editProduct")->with("product", $product)->with("categories", Category::all());
    }

    public function addCategory()
    {
        return view("addCategory");
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        if(empty($category)) {
            return redirect()->back()->with("error","Category not found");
        }
        return view("editCategory")->with("category", $category);
    }

    public function products()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->category = Category::find($product->category_id);
        }

        return view('products')->with('products', $products);
    }

    public function adminProducts()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->category = Category::find($product->category_id);
        }
        return view('adminProducts')->with('products', $products);
    }

    public function categories()
    {
        return view('categories')->with('categories', Category::all());
    }

    public function adminCategories()
    {
        return view('adminCategories')->with('categories', Category::all());
    }

    public function getProducts()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->category = Category::find($product->category_id);
        }
        return view('products')->with('products', $products);
    }
    
    public function getCategoryProducts($id)
    {
        $products = Product::where('category_id', $id)->get();
        foreach ($products as $product) {
            $product->category = Category::find($product->category_id);
        }
        return view('products')->with('products', $products);
    }


}