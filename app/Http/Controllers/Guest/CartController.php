<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];

        return view('guests.cart.index')->with('cart', $cart);
    }    
}
