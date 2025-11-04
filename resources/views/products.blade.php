@extends('layout.mainLayout')

@section('title', 'Koleksi Produk')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Jelajahi Koleksi Kami</h1>

    <form action="{{ route('products') }}" method="GET" class="mb-5">
        <div class="input-group">
            <input 
                type="text" 
                name="search" 
                class="form-control" 
                placeholder="Cari produk..." 
                value="{{ $search ?? '' }}"
            >
            <button type="submit" class="btn btn-dark">Cari</button>
        </div>
    </form>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-lg-3 col-md-4 col-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ $product->image }}" class="card-img-top" alt="Foto Produk"
                        style="height: 280px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text fw-bold">Rp {{ number_format($product->price) }}</p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-outline-dark">Lihat Detail</a>
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