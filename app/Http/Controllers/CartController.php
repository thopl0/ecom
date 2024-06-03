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
        $cart = new Cart();
        $cart->product_id = $request->productId;
        $cart->user_id = auth()->user()->id;
        $cart->quantity = $request->quantity;
        $cart->save();
        return redirect()->back();
    }       
}