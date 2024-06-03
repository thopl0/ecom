<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\category;
class CartController extends Controller
{
    //
    public function addItem(Request $request)
    {
        $cartProduct = Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $request->productId)
                            ->first();
        if ($cartProduct) {
            $cartProduct->quantity = $request->quantity+$cartProduct->quantity; 
            $cartProduct->save();
            return redirect()->back();
        }
        $cart = new Cart();
        $cart->product_id = $request->productId;
        $cart->user_id = auth()->user()->id;
        $cart->quantity = $request->quantity;
        $cart->save();
         return redirect()->back();
    }       

    public function getCart(Request $request)
    {
        $cartItems = Cart::where("user_id", auth()->user()->id)->get();
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            $product->category = Category::find($product->category_id);
            $cartItem->product = $product;
            $total += $cartItem->quantity * $cartItem->product->price;
        }
        $cartItems->total = $total;

        return view("cart")->with("cartItems", $cartItems);
    }

    static public function deleteCart($user_id)
    {
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($cartItems as $cartItem) {
            Cart::destroy($cartItem->id);
        }
    }

    static function getTotalCartAmount($user_id)
    {
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            $total += $cartItem->quantity * $product->price;
        }

        return $total;
    }

    public function deleteCartItem(Request $request)
    {
         $cartProduct = Cart::find($request->cartId);

        $cartProduct->delete();
        return redirect()->back();
    }


}