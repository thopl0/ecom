<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
class CartController extends Controller
{
    //
    public function addItem(Request $request)
    {
        $product = Product::find($request->productId);
        Cart::add($product, $request->quantity);
        return redirect()->back();
    }
}