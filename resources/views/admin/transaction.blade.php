@extends('layout.admin')
@section('title', 'Transaction List')

@section('content')
    {{-- card container --}}
    <div class="flex items-center justify-between">
        <h1 class="font-bold text-xl">Transaction List</h1>
        <a href="/admin/transaction/export" target="_blank"
            class="px-3 py-2 rounded bg-rose-600 shadow text-white hover:bg-rose-500 transition">Export to
            Excel</a>
    </div>

    <table class="w-full text-left rtl:text-right shadow-md rounded-md overflow-clip mt-3">
        <thead class="font-medium text-white bg-rose-600">
            <tr>
                <th class="p-3">
                    No
                </th>
                <th class="px-6 py-3">
                    Name
                </th>
                <th class="px-6 py-3">
                    Address
                </th>
                <th class="px-6 py-3">
                    Amount
                </th>
                <th class="px-6 py-3">
                    Date
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaction->customer->nama }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaction->customer->alamat }}
                    </td>
                    <td class="px-6 py-4">
                        {{ 'Rp ' . number_format($transaction->items[0]->total, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaction->created_at->format('d M Y') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
