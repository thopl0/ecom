<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\category;

class WishlistController extends Controller
{
    //
    public function addToWishlist(Request $request)
    {
        $wishlistProduct = Wishlist::where('user_id', auth()->user()->id)
                    ->where('product_id', $request->productId)
                    ->first();
        if($wishlistProduct) {
         return redirect()->back();
        }
        $wishlist = new Wishlist();
        $wishlist->product_id = $request->productId;
        $wishlist->user_id = auth()->user()->id;
        $wishlist->save();
         return redirect()->back();
    }       

    public function getWishlist(Request $request)
    {
        $wishlistItems = Wishlist::where("user_id", auth()->user()->id)->get();
        $total = 0;
        foreach ($wishlistItems as $wishlistItem) {
            $product = Product::find($wishlistItem->product_id);
            $product->category = Category::find($product->category_id);
            $wishlistItem->product = $product;
            $total += $wishlistItem->quantity * $wishlistItem->product->price;
        }
        $wishlistItems->total = $total;

        return view("wishlist")->with("wishlistItems", $wishlistItems);
    }

    public function deleteWishlistItem(Request $request)
    {
        $wishlistProduct = Wishlist::find($request->wishlistId);

        $wishlistProduct->delete();
        return redirect()->back();
    }
}