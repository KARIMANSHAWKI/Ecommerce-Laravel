<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;


class ItemsController extends Controller
{
    public function index(){
        $carts = session()->get('cart');
        $cartDB = Cart::all();
        return view ('site.cartItems')->with('carts', $carts)->with('cardDB', $cartDB);
    }
    
}
