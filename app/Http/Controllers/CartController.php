<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('id_customer', auth()->id())->where("status_bayar", 0)->firstOrCreate([
            "id_customer" => auth()->id(),
        ]);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = Cart::where('id_customer', auth()->id())->where("status_bayar", 0)->firstOrCreate(["id_customer" => auth()->id()]);
        $cartItem = $cart->items()->firstOrNew([
            'product_id' => $product->id,
        ]);
        $cartItem->quantity += 1;
        $cartItem->save();

        return redirect()->route('cart.index');
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('cart.index');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        if ($cartItem->product->stock < $request->quantity) {
            $cartItem->quantity = $cartItem->product->stock;
        } else {
            $cartItem->quantity = $request->quantity > 0 ? $request->quantity : 1;
        }
        $cartItem->save();

        return redirect()->route('cart.index');
    }
}