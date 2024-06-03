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
        $category->image = $this->uploadImage('upload/', $request->image);
        $category->save();
        return redirect()->back()->with('message', 'Category added successfully');
    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->category;
        $category->image = $this->uploadImage('upload/', $request->image);
        $category->save();
        return redirect()->back()->with('message', 'Category updated successfully');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('message', 'Category deleted successfully');
    }
}