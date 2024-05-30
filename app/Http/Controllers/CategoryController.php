<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    //
    public function addCategory(Request $request)
    {
        $category = new Category;
        $category->name = $request->category;
        $category->save();
        return redirect()->back()->with('message', 'Category added successfully');
    }
}