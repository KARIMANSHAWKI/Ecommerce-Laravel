<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.manageCategory', compact('categories'));
    }


    public function addCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $image = $request->file('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $category->image = $new_name;
        $category->save();
        return response()->json($category);
    }
  
    public function getCategoryById($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }
    
    public function updateCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->image =  $request->image;
        $category->save();
        return response()->json($category);
    }
}
