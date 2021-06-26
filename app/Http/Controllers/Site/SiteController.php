<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

class SiteController extends Controller
{
    public function index(){

        $categories = Category::orderBy('id', 'DESC')->get();
        $products = Product::orderBy('id', 'DESC')->get();
       
        return view('site.home')->with('categories', $categories)->with('products', $products);
    }

    public function allProduct(){

    }
}
