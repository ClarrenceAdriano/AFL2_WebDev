@extends('layout.mainLayout')

@section('title', 'Pembayaran')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Pilih Metode Pembayaran</h2>

    <p><strong>Total yang harus dibayar:</strong> Rp {{ number_format($total) }}</p>

    <form action="{{ route('pay') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Metode Pembayaran</label>
            <select name="payment_method" class="form-select" required>
                <option value="">-- Pilih Metode --</option>
                <option value="qris">QRIS</option>
                <option value="transfer">Transfer Bank</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Bayar</button>
    </form>
</div>
@endsection
