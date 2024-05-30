<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SiteController extends Controller
{
    //
    public function index(Request $request)
    {
        return view("welcome")->with("products", Product::all());
    }
}