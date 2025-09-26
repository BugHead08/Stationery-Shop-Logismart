<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class ShoppingHistoryController extends Controller
{
    public function index()
    {
        $totals = [];
        $history = Cart::where("id_customer", auth()->id())->where("status_bayar", 1)->orderBy("updated_at", "desc")->with("items")->with("items.product")->get();

        foreach ($history as $cart) {
            $totals[$cart->id] = $cart->items->sum(function ($item) {
                return $item->quantity * $item->product->price;
            });
        }

        // return json_decode($history);
        return view("history.Shoppinghistory", [
            "items" => $history,
            "totals" => $totals
        ]);
    }
}
