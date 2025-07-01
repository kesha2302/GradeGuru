<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Sample logic – retrieve cart from session or database
     $cartItems = session()->get('cart', []);
        return view('ClientView.Cart', compact('cartItems'));

    }
    public function addToCart(Request $request)
{
    $cart = session()->get('cart', []);

    $productName = $request->name;

    if (isset($cart[$productName])) {
        $cart[$productName]['quantity'] += $request->quantity;
    } else {
        $cart[$productName] = [
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ];
    }

    session()->put('cart', $cart);

    return redirect()->route('cart.index')->with('success', 'Item added to cart!');
}

}

