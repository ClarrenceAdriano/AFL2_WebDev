@extends('layout.mainLayout')

@section('title', 'Koleksi Produk')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5">Jelajahi Koleksi Kami</h1>

        @forelse ($categories as $category)
            @if ($category->products->isNotEmpty())
                <div class="mb-5">
                    <h2 class="mb-3">{{ $category->name }}</h2>
                    <p class="mb-3">{{ $category->description }}</h2>
                        <hr>

                    <div class="row">
                        @foreach ($category->products as $product)
                            <div class="col-lg-3 col-md-4 col-6 mb-4">
                                <div class="card h-100 border-0 shadow-sm">
                                    <img src="{{ $product->image }}" class="card-img-top" alt="Foto dari Factory"
                                        style="height: 280px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text fw-bold">Rp {{ number_format($product->price) }}</p>
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-outline-dark">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @empty
            <div class="text-center">
                <p>Belum ada produk yang tersedia untuk ditampilkan.</p>
            </div>
        @endforelse

    </div>
@endsection
