@extends('layout.main')
@section('title', 'Checkout')

@section('content')
    <section class="px-3 py-2">
        <h1>Checkout</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Total Belanja: Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
        <form action="/checkout" method="POST" class="row col-12 px-3 py-2" enctype="multipart/form-data">
            @csrf
            @if (count($cartItems) > 0)
                <div class="w-100">
                    <h4 class="h5">Pembayaran Via Bank GOA</h4>
                    <p class="fw-bold">No Virtual Account: <span>{{ rand(1000000000000000, 9999999999999999) }}</span>
                    </p>
                    <div class="w-100">
                        <label for="upload">Upload Bukti Pembayaran</label>
                        <input type="file" id="buktiPembayaran" name="buktiPembayaran" accept="image/png, image/jpeg">
                    </div>
                    @error('buktiPembayaran')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            @endif
            <div class="form-control col-5 mr-2">{{ auth()->user()->nama }}</div>
            <div class="form-control col-5 mr-2">{{ auth()->user()->telp_hp }}</div>
            <button class="btn btn-primary col-1" type="submit">Checkout</button>
        </form>
    </section>
@endsection
