@extends('layout.admin')
@section('title', 'Products')

@section('content')
    <div class="flex items-center justify-between">
        <h1 class="text-xl font-bold">All Products</h1>
        <a href="/admin/products/create"
            class="px-3 py-2 rounded-md shadow bg-rose-600 text-white hover:bg-rose-700 hover:no-underline transition">New
            Product</a>
    </div>
    {{-- card container --}}
    <div class="grid grid-cols-4 gap-3 p-3 w-full h-fit">
        @foreach ($products as $product)
            {{-- card --}}
            <div class="rounded-md shadow overflow-clip bg-rose-100 h-auto">
                {{-- img --}}
                <div class="h-40 w-auto overflow-clip rounded flex items-center justify-center group">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform ease-in-out">
                </div>
                <div class="flex items-center px-3 pt-2 h-fit">
                    <div class="flex-1">
                        {{-- title --}}
                        <h2 class="w-full overflow-hidden whitespace-nowrap overflow-ellipsis">{{ $product->name }}</h2>
                        {{-- price --}}
                        <p class="font-bold">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-md">Stock: <span>{{ $product->stock }}</span></p>
                    </div>
                    <a href="/admin/products/{{ $product->id }}/edit"
                        class="w-8 h-8 rounded flex items-center justify-center hover:bg-rose-200 hover:text-rose-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                            <path
                                d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                            <path
                                d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
