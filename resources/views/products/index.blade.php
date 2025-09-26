@extends('layout.main')
@section('title', 'LogisMart')

@section('content')
    <div class="container">
        <h1>Produk Terbaru</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $product->name }}</h4>
                            <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="card-text">Stok: {{ $product->stock > 0 ? $product->stock : 'Habis' }}</p>
                            @if ($product->stock > 0)
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Beli</button>
                                </form>
                            @else
                                <button type="button" class="btn btn-secondary" disabled>Stok Habis</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
