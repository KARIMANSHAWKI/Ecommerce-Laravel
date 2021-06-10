<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.show', compact('categories'));
    }


    public function addCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $image = $request->file('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/category'), $new_name);
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
        $path = public_path('images/category/'. $category->image);
        if(File::exists($path) && $request->file('image') ) {
            File::delete($path);
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/category'), $imageName);
            $category->image = $imageName;
        }

        $category->save();
        return response()->json($category);
    }


    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        $path = public_path('images/category'. $category->image);
        if(File::exists($path)) {
            File::delete($path);
        }

        return response()->json(['success' =>'Category Deleted Successfully']);
}
}
