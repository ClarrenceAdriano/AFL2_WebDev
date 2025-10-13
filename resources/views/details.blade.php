@extends('layout.mainLayout')

@section('title', $product->name)

@section('content')
<div class="container my-5">
    <a href="javascript:history.back()" class="btn btn-outline-secondary mb-4">
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
                @else
                    <p class="text-danger fw-bold">Stok Habis</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection