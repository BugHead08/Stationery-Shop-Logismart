@extends('layout.main')
@section('title', 'Cart')

@section('content')
    <div class="container mt-5">
        <h4>Keranjang Belanja</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->items as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp. {{ number_format($item->product->price, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                    class="form-control" style="width: 80px; display: inline;">
                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                            </form>
                        </td>
                        <td>Rp. {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('product.index') }}"class="btn btn-primary">Lanjutkan Belanja</a>
        <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
    </div>
@endsection
