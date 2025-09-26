@extends('layout.admin')
@section('title', 'Add Products')

@section('content')
    <div class="flex items-center gap-3">
        <a href="/admin/products"
            class="w-9 h-9 flex items-center justify-center rounded-md shadow hover:bg-zinc-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                <path fill-rule="evenodd"
                    d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z"
                    clip-rule="evenodd" />
            </svg>
        </a>
        <h1 class="text-xl font-bold">Edit Product</h1>
    </div>
    <form method="POST" action="/admin/products/{{ $product->id }}/edit" class="mt-3 w-full h-full"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/' . $product->image) }}" alt="img upload" id="imgPreview"
                class="imgPreview {{ $product->image ? 'active' : '' }}">
            <input type="file" name="image" id="image" class="col-span-2" accept="image/png, image/jpeg"
                {{ $product->image ? '' : 'required' }}>
        </div>
        @error('image')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
        <div class="flex items-center gap-3 w-full mt-2">
            <div class="flex-1 flex flex-col">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="flex-1 px-3 py-2 rounded border border-zinc-900"
                    value="{{ old('name') ?? $product->name }}" required>
                @error('name')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex-1 flex flex-col">
                <label for="price">Price</label>
                <input type="number" min="0" name="price" id="price"
                    class="flex-1 px-3 py-2 rounded border border-zinc-900"
                    value="{{ old('price') ?? intVal($product->price) }}" required>
                @error('price')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex-1 flex flex-col">
                <label for="stock">Stock</label>
                <input type="number" min="0" name="stock" id="stock"
                    class="flex-1 px-3 py-2 rounded border border-zinc-900"
                    value="{{ old('stock') ?? intVal($product->stock) }}" required>
                @error('stock')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="w-full flex items-center justify-end">
        <button type="submit" class="px-3 py-2 rounded text-white bg-blue-600 hover:bg-blue-500 transition-colors mt-2">Save</button>
        </div>
    </form>
    <form action="/admin/products/{{ $product->id }}" method="post" id="deleteForm" class="flex items-center justify-end w-full">
        @method('DELETE')
        @csrf
        <button type="submit" class="px-3 py-2 rounded text-white bg-rose-600 hover:bg-rose-700 transition-colors mt-2">Delete Product</button>
    </form>
    <script>
        let imgPreview = document.querySelector("#imgPreview")
        let imgInput = document.querySelector("#image")

        const handleDelete = (e) => {
            e.preventDefault();
            const form = document.querySelector("#deleteForm")
            form.submit()
        }

        imgInput?.addEventListener("change", (e) => {
            const urlImage = URL.createObjectURL(e.target.files[0])
            imgPreview?.classList.add("active")
            imgPreview.src = urlImage
            console.log(urlImage)
        })
    </script>
@endsection
