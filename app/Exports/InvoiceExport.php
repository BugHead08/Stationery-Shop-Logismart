<?php

namespace App\Exports;

use App\Models\Cart;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InvoiceExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return Cart::where("status_bayar", 1)->orderBy("updated_at", "desc")->get();
    // }
    public function view(): View
    {
        $transaction = Cart::where('status_bayar', 1)
            ->with(['items' => function ($query) {
                $query->select('cart_id', DB::raw('SUM(quantity * products.price) as total'))
                    ->join('products', 'product_id', '=', 'products.id')
                    ->groupBy('cart_id');
            },
                'customer' => function ($query) {
                    $query->select('id', 'nama', "alamat"); // Pastikan Anda memilih 'id' jika 'id' adalah foreign key
                }
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        return view("admin.excel.invoce", [
            "transactions" => $transaction
        ]);
    }
}
