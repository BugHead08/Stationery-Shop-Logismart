<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Toko')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav w-100">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('product.index') }}">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/checkout">Checkout</a>
                </li>
                <li class="nav-item w-auto">
                    <a class="nav-link w-auto" href="/history">Riwayat Pembelian</a>
                </li>
                <div class="d-flex flex-fill justify-content-end ">
                    @auth
                        <li class="nav-item">
                            <p class="nav-link active">{{ auth()->user()->nama }}</p>
                        </li>
                        <form action="/logout" method="post" class="nav-item">
                            @csrf
                            <button class="ml-3 btn btn-primary">Logout</button>
                        </form>
                    @else
                        <a class="nav-link active" href="/login">Login</a>
                    @endauth
                </div>
            </ul>
        </div>
    </nav>
    @if (session('error'))
        <div class="alert alert-success alert-dismissible fade show mx-5 my-2" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mx-5 my-2" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
