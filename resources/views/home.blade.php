@extends('layout.mainLayout')

@section('title', 'Home')

@section('content')

    <div class="position-relative">

        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">

                @forelse ($carouselProducts as $product)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ $product->image }}" class="d-block w-100" alt="{{ $product->name }}"
                            style="height: 75vh; object-fit: cover;">
                    </div>
                @empty
                    <div class="carousel-item active">
                        <img src="https://via.placeholder.com/1200x550.png?text=Selamat+Datang" class="d-block w-100"
                            alt="Placeholder Image" style="height: 75vh; object-fit: cover;">
                    </div>
                @endforelse

            </div>
        </div>

        <div class="position-absolute top-50 start-50 translate-middle z-2 text-center w-75">
            <div class="bg-white bg-opacity-50 p-4 p-md-5 rounded-3">
                <h1 class="display-5 fw-bold">Koleksi Terbaru Musim Ini</h1>
                <p class="fs-4 d-none d-md-block">Temukan gaya terbaikmu dengan koleksi pakaian kami yang dirancang untuk
                    kenyamanan dan tren terkini.</p>
                <a class="btn btn-dark btn-lg" href="/products" role="button">Jelajahi Koleksi</a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row text-center mb-4">
            <div class="col-12">
                <h2>Produk Unggulan</h2>
                <hr class="w-25 mx-auto">
            </div>
        </div>

        <div class="row">
            @forelse ($carouselProducts as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ $product->image }}" class="card-img-top" alt="Foto dari Factory" style="height: 280px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted">{{ $product->description }}</p>
                            <p class="fw-bold">Rp {{ number_format($product->price) }}</p>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-outline-dark">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>

@endsection
