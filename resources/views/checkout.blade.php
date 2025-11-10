@extends('layout.mainLayout')

@section('title', 'Checkout')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4 text-center">Checkout</h2>

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="table-secondary">
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach ($cartItems as $item)
                    @php
                        $total = $item->product->price * $item->quantity;
                        $grandTotal += $total;
                    @endphp
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp {{ number_format($item->product->price) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp {{ number_format($total) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="fw-bold">
                <tr>
                    <td colspan="3">Grand Total</td>
                    <td>Rp {{ number_format($grandTotal) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <form action="{{ route('pay') }}" method="POST" class="mt-4 text-center">
        @csrf
        <label class="me-2">Metode Pembayaran:</label>
        <select name="payment_method" required>
            <option value="qris">QRIS</option>
            <option value="transfer">Transfer Bank</option>
        </select>
        <button type="submit" class="btn btn-primary ms-2">Bayar</button>
    </form>
</div>
@endsection
