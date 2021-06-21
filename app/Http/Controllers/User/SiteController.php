<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class SiteController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('user.home', compact('categories'));
    }

    public function allProduct(){
        $products = Product::orderBy('id', 'DESC')->get();

    }
}
