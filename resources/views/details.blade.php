@extends('layout.mainLayout')

@section('title', $product->name)

@section('content')
    <div class="container my-5">
        <a href="/products" class="btn btn-outline-secondary mb-4">
            &laquo; Kembali
        </a>

        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="{{ $product->image }}" class="img-fluid rounded shadow-sm w-100" alt="{{ $product->name }}">
            </div>

            <div class="col-md-6">
                <h1 class="display-5 fw-bold">{{ $product->name }}</h1>
                <h3 class="text-danger my-3">Rp {{ number_format($product->price) }}</h3>
                <hr>

                <h4 class="mt-4">Deskripsi Produk</h4>
                <p class="lead">{{ $product->description }}</p>

                <div class="mt-4">
                    @if ($product->stock > 0)
                        <p class="text-success fw-bold">Stok Tersedia: {{ $product->stock }} buah</p>

                        @auth
                            @if (Auth::user()->role === 'user')
                                <form action="{{ route('cart.store', $product->id) }}" method="POST" class="mt-3">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                                    </button>
                                </form>
                            @elseif(Auth::user()->role === 'admin')
                                <div class="mt-3 d-flex gap-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-lg">
                                        <i class="bi bi-pencil-square"></i> Edit Produk
                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-lg">
                                            <i class="bi bi-trash"></i> Hapus Produk
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @else
                            <p class="text-muted mt-3">
                                <a href="{{ route('login') }}">Login</a> untuk menambahkan ke keranjang.
                            </p>
                        @endauth
                    @else
                        <p class="text-danger fw-bold">Stok Habis</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
