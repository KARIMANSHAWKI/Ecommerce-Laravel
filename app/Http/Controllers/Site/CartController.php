<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);
        $cartCount = cartCount();
        return view('site.cart')->with('product', $product);
    }

    public function addToCart(Request $req)
    {
        $data = $req->all();
        $id = $data['id'];

        $cart = session()->get('cart');
        $existingPro = Cart::where(["product_id" => $id])->first();
        
        
        if (Auth::check()) {
            if (isset($cart[$id]['id']) == $data['id']) {
                unset($cart[$id]);
                $req->session()->put('cart', $cart);
                $this->createCart($req);
                return redirect()->route('site.index')->with('success', 'Product added to cart successfully!');

            }elseif($existingPro){
                $existingPro->quantity = $data['quantity'];
                $existingPro->save();
                return redirect()->route('site.index')->with('success', 'Product added to cart successfully!');

            } else {
                $this->createCart($req);
                return redirect()->route('site.index')->with('success', 'Product added to cart successfully!');
            }
        } else {
            // if user not auth product will be saved in session
            if (!$cart) {
                $cart = [
                $id => [
                    "id" => $id,
                    "quantity" => $data['quantity'],
                ]
            ];
                $req->session()->put('cart', $cart);
                return redirect()->route('site.index')->with('success', 'Product added to cart successfully!');
            }

            // if cart not empty then check if this product exist then update quantity
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $data['quantity'];
                session()->put('cart', $cart);
                return redirect()->route('site.index')->with('success', 'Product added to cart successfully!');
            }

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                    "id" => $id,
                    "quantity" => $data['quantity'],
                ];

            $req->session()->put('cart', $cart);
            return redirect()->route('site.index')->with('success', 'Product added to cart successfully!');
        }
    }


    public function testSession(Request $request)
    {
        if ($request->session()->has('cart')) {
            $cart = $request->session()->forget('cart');
        // $length = count($cart);
            // dd($cart);
        } else {
            echo "session not found";
        }
    }

    protected function createCart(Request $req){
        $data = $req->all();
        $cartDB = new Cart();
        $cartDB->user_id = Auth::id();
        $cartDB->product_id = $data['id'];
        $cartDB->quantity = $data['quantity'];
        $cartDB->save();
    }

    

  


}
