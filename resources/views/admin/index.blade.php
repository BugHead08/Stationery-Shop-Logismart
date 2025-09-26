@extends('layout.admin')
@section('title', 'Dashboard')

@section('content')
    <h1 class="text-xl font-bold">Dashboard</h1>
    <div class="grid grid-cols-2 gap-3 my-3">
        {{-- total pembelian --}}
        <div class="flex-1 px-3 py-2 rounded-md shadow bg-rose-100 ">
            <h2>Total purchases</h2>
            <p class="text-5xl font-bold">{{ $totalPurchases }}</p>
        </div>
        {{-- total produk --}}
        <div class="flex-1 px-3 py-2 rounded-md shadow bg-rose-100 ">
            <h2>Total Product</h2>
            <p class="text-5xl font-bold">{{ $totalProduct }}</p>
        </div>
        {{-- total stock --}}
        {{-- <div class="flex-1 px-3 py-2 rounded-md shadow bg-rose-100 ">
            <h2>Total Stock Product</h2>
            <p class="text-5xl font-bold">#</p>
        </div> --}}
    </div>
    <h2 class="text-lg font-medium">Top Purchases Product</h2>
    <div class="w-full">
        <table class="table-auto w-full mt-3 bg-rose-100 px-4 py-3 rounded-md overflow-clip">
            <thead>
                <tr class="bg-rose-600 text-white">
                    <th class="py-3">Product</th>
                    <th class="py-3">Price</th>
                    <th class="py-3">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topProducts as $item)
                    <tr>
                        <td class="px-3 py-2">{{ $item->name }}</td>
                        <td class="text-center px-3 py-2">{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</td>
                        <td class="text-center px-3 py-2">{{ $item->total_purchases }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
