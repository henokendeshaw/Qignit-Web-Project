<?php

namespace App\Http\Controllers;

use App\Album;
use App\Cart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function getCart()
    {
        if (!Session::has('cart'))
        {
            return view('pages.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('pages.cart', ['number' => $cart->number, 'items' => $cart->items, 'totalPrice' =>$cart->totalPrice]);
    }


    public function getId()
    {
        
        $cart = Album::all();
        return view('welcome',['cart' => $cart]);
    }

    public function addToCart(Request $request, $id)
    {
        $cart = Album::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart2 = new Cart($oldCart);

        $cart2->add($cart, $cart->id);
        $request->session()->put('cart', $cart2);
        
        return redirect()->route('welcome');


    }

    public function remove(Request $request,$id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart2 = new Cart($oldCart);
        $cart2->removeItem($id);

        $request->session()->put('cart', $cart2);
        
        return redirect()->route('getCart');

    }

    public function clear(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart2 = new Cart($oldCart);

        Session::forget('cart');
        return redirect()->route('welcome');

      
    }


}
