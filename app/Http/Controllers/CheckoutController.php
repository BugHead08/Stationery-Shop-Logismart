<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        $id_user = auth()->id();

        try {
            $cart = Cart::where('id_customer', $id_user)->where('status_bayar', 0)->first();
            if (!empty($cart->items)) {
                $total = $cart->items->sum(function ($item) {
                    return $item->quantity * $item->product->price;
                });
            }

            return view('checkout.index', [
                "cartItems" => $cart->items ?? [],
                "totalPrice" => $total ?? 0
            ]);
        } catch (\Exception $err) {
            return redirect()->back()->with("error", "Something went wrong");
        }
    }

    public function checkout(Request $request)
    {
        $authUser = auth()->user();
        $request->validate([
            'buktiPembayaran' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        try {
            // open transaction
            DB::beginTransaction();

            $cart = Cart::where('id_customer', $authUser->id)->where('status_bayar', 0);
            $cartItems = $cart->with("items")->with('items.product')->first();

            foreach ($cartItems->items as $key => $value) {
                if ($value->product->stock < $value->quantity) {
                    throw new \Exception("Stok produk tidak mencukupi");
                }

                $updateProduct = Product::where('id', $value->product->id)->first();
                $updateProduct->stock = $value->product->stock - $value->quantity;
                $updateProduct->save();

                if (!$updateProduct) {
                    throw new \Exception("Gagal melakukan update!");
                }
            }

            $cart->update([
                "status_bayar" => 1,
            ]);
            DB::commit();

            return redirect("/products")->with("success", "Checkout berhasil dilakukan!");
        } catch (\Exception $err) {
            DB::rollBack();
            // dd($err->getMessage());
            return redirect()->back()->with("error", $err->getMessage());
        }
    }
}
