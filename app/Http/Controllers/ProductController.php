<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;

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
        foreach ($products as $product) {
            $product->category = Category::find($product->category_id);
        }
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
        return redirect('admin/products');
    }

    public function updateProduct(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->image) {
            $product->image = $this->uploadImage('upload/', $request->image);
        }
        $product->category_id = $request->category; 
        $product->save();
        return redirect('/admin/products');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }

}