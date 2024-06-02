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
}