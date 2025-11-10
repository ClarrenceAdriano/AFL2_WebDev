@extends('layout.mainLayout')

@section('title', 'Detail Transaksi')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4 text-center">Detail Transaksi</h2>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <p><strong>Tanggal:</strong> {{ $transaction->created_at->format('d M Y - H:i') }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ ucfirst($transaction->payment_method) }}</p>
            <p><strong>Status:</strong>
                <span class="badge 
                    @if($transaction->status === 'pending') bg-warning text-dark
                    @elseif($transaction->status === 'paid') bg-info text-dark
                    @elseif($transaction->status === 'shipped') bg-primary
                    @elseif($transaction->status === 'done') bg-success
                    @endif">
                    {{ ucfirst($transaction->status) }}
                </span>
            </p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction->products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product['product_name'] }}</td>
                        <td>Rp {{ number_format($product['price'], 0, ',', '.') }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>Rp {{ number_format($product['price'] * $product['quantity'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="table-light">
                <tr>
                    <th colspan="4" class="text-end">Total</th>
                    <th>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="text-center mt-4">
        <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
