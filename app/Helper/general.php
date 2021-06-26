<?php

use App\Models\Cart;


 function cartCount(){
    $cart = session()->get('cart');
    $length;
    if($cart){
        $length = count($cart);
    }else {
        $length = 0;
    }

    $carts = Cart::all() ;
    $lengthDB = count($carts);
    $cartCount = $length + $lengthDB;

    return $cartCount;
}