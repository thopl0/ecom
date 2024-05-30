<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function product($id)
    {
        $product = Product::find($id);
        $similarProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        return view('product')->with('product', $product)->with('similarProducts', $similarProducts);
    }

    public function products()
    {
        $products = Product::all();
        return view('products')->with('products', $products);
    }
    

    public function addProduct(Request $request) 
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $this->uploadImage('upload/', $request->image);
        $product->category_id = $request->category; 
        $product->save();
        return redirect()->back()->with('message', 'Product added successfully');
    }

}