<?php

namespace App\Http\Controllers;

use App\Models\ClassPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if (!$cart) {
            $cart = [];
        }
        // Log::info('Cart contents: ', $cart);
        return view('ClientView.Cart', compact('cart'));
    }


    public function addToCart(Request $request)
    {
        $classPackage = ClassPrice::find($request->id);

        if (!$classPackage) {
            return response()->json(['message' => 'Class Package not found'], 404);
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$request->id])) {
            return response()->json(['message' => 'Item already in cart'], 409);
        }

        $cart[$request->id] = [
            'cp_id' => $classPackage->cp_id,
            'title' => $classPackage->title,
            'price' => $classPackage->price,
            'standard' => $classPackage->classNames->standard ?? 'N/A',
        ];

        Session::put('cart', $cart);

        $totalItems = count($cart);
        $totalAmount = array_sum(array_column($cart, 'price'));

        session(['totalAmount' => $totalAmount]);

        return response()->json([
            'message' => 'Item added to cart successfully!',
            'totalItems' => $totalItems,
            'totalPrice' => $totalAmount
        ]);
    }

    public function removeFromCart(Request $request)
    {

        $id = $request->id;
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);

            $totalAmount = array_sum(array_column($cart, 'price'));
            session(['totalAmount' => $totalAmount]);

            return response()->json([
                'success' => 'Item removed from the cart successfully!',
                'totalAmount' => $totalAmount,
            ]);
        }

        return response()->json(['message' => 'Item not found in cart'], 404);
    }
}
