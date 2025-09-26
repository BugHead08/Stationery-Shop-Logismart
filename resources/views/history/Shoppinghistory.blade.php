@extends('layout.main')
@section('title', 'Shooping History')

@section('content')
    <div class="container">
        <h1>Riwayat Pembelian</h1>
        @foreach ($items as $item)
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card__body">
                            <h5 class="card-title px-3 py-2">Pembelian pada Tanggal {{ $item->updated_at->format('d M Y') }}
                            </h5>
                            @foreach ($item->items as $product)
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="card__item">
                                            {{-- img --}}
                                            <div class="img-container">
                                                <img src="{{ asset('images/' . $product->product->image) }}"
                                                    class="img-content" alt="image {{ $product->product->name }}">
                                            </div>
                                            {{-- content --}}
                                            <div class="card__content">
                                                {{-- title --}}
                                                <label class="card__content-title">{{ $product->product->name }}</label>
                                                <p class="card__content-price">
                                                    {{ 'Rp ' . number_format($product->product->price, 0, ',', '.') }}</p>
                                                {{-- price --}}
                                            </div>
                                            {{-- quantity --}}
                                            <p class="card__quantity">{{ $product->quantity }} Pcs</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-12 d-flex">
                                <label class="flex-fill font-weight-bold">Total</label>
                                <p class="font-weight-bold h-4">{{ 'Rp ' . number_format($totals[$item->id], 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
