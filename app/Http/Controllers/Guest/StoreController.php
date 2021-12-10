<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;

class StoreController extends Controller
{
    public function index()
    {
        $dishes = Dish::get();

        $cart = session()->get('cart');
        if($cart == null)
            $cart = [];
        return view('guests.store.index')->with('dishes', $dishes)->with('cart', $cart);
    }

    public function addToCart(Request $request)
    {
        session()->put('cart', $request->post('cart'));
        
        return response()->json([
            'status' => 'added'
        ]);
    }
}
