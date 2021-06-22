<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;



class CartController extends Controller
{
    public function index($id){
        $product = Product::find($id);
        return view('site.cart', compact('product'));
        
    }
}
