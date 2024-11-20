<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function update(Request $request)
    {
        $product = Product::find($request->product_id);
        $action = $request->action;

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            if ($action === 'increase') {
                $cartItem->quantity += 1;
            } elseif ($action === 'decrease' && $cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
            }
            $cartItem->save();
        } else {
            if ($action === 'increase') {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'quantity' => 1,
                ]);
            }
        }

        return response()->json(['success' => true]);
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully.');
    }
}
