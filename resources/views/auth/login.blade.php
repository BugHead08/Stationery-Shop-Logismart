@extends('layout.main')
@section('title', 'Login')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h4>Login Pelanggan</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="row d-flex justify-content-between align-items-center w-100 ml-0">
                        <div>Belum punya akun ? <a href="/register" class="mr-2">Daftar disini</a></div>
                        <form action="{{ route('product.index') }}" method="get" target="_blank">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
