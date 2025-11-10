@extends('layout.mainLayout')

@section('title', 'Koleksi Produk')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="text-center m-0 flex-grow-1">Jelajahi Koleksi Kami</h1>
        </div>

        @auth
            @if (Auth::user()->role === 'admin')
                <div class="d-flex justify-content-start align-items-center mb-4 gap-2">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Produk
                    </a>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-primary">
                        <i class="bi bi-tags"></i> Manage Categories
                    </a>
                </div>
            @endif
        @endauth

        <form action="{{ route('products') }}" method="GET" class="mb-5">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari produk..."
                    value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-dark">Cari</button>
            </div>
        </form>

        @if (isset($categories) && $categories->count())
            <ul class="nav nav-pills justify-content-center mb-4 flex-wrap">
                <li class="nav-item">
                    <a href="{{ route('products') }}" class="nav-link {{ empty($categoryId) ? 'active' : '' }}">
                        Semua
                    </a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a href="{{ route('products', ['category' => $category->id]) }}"
                            class="nav-link {{ ($categoryId ?? null) == $category->id ? 'active' : '' }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="text-center mb-5">
            @if (!empty($categoryId))
                @php
                    $currentCategory = $categories->firstWhere('id', $categoryId);
                @endphp

                @if ($currentCategory)
                    <p class="text-muted fs-5">
                        {{ $currentCategory->description ?? 'Tidak ada deskripsi untuk kategori ini.' }}</p>
                @else
                    <p class="text-muted fs-5">Kategori tidak ditemukan.</p>
                @endif
            @else
                <p class="text-muted fs-5">Semua produk yang kami jual, pilih kategori untuk melihat lebih spesifik.</p>
            @endif
        </div>

        <div class="row">
            @forelse ($products as $product)
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ $product->image }}" class="card-img-top" alt="Foto Produk"
                            style="height: 280px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-truncate" style="max-height: 50px;">{{ $product->description }}</p>
                            <p class="card-text fw-bold mb-3">Rp {{ number_format($product->price) }}</p>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-outline-dark mt-auto">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    @if ($search ?? false)
                        <p>Produk dengan kata kunci '<strong>{{ $search }}</strong>' tidak ditemukan.</p>
                    @else
                        <p>Belum ada produk yang tersedia untuk ditampilkan.</p>
                    @endif
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {!! $products->appends(request()->query())->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
