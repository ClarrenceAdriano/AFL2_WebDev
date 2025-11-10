@extends('layout.mainLayout')

@section('title', 'Your Cart')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-4 text-center">🛒 Your Cart</h2>

        @if ($cartItems->count() > 0)
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
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
                                <td class="fw-semibold">{{ $item->product->name }}</td>
                                <td>Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                                <td style="width: 150px;">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST"
                                        class="d-flex justify-content-center">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                            class="form-control form-control-sm text-center" style="width: 80px;">
                                        <button type="submit" class="btn btn-sm btn-outline-success ms-2">Update</button>
                                        <i class="bi bi-check-lg"></i>
                                        </button>
                                    </form>
                                </td>

                                <td>Rp {{ number_format($total, 0, ',', '.') }}</td>

                                <td>
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Remove this item from cart?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-light fw-bold">
                        <tr>
                            <td colspan="3" class="text-end">Grand Total:</td>
                            <td colspan="2">Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('products') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Continue Shopping
                </a>
                <a href="{{ route('checkout') }}" class="btn btn-primary">
                    <i class="bi bi-cash-stack"></i> Checkout
                </a>

            </div>
        @else
            <div class="text-center mt-5">
                <p class="fs-5 text-muted">Your cart is empty 😢</p>
                <a href="{{ route('products') }}" class="btn btn-outline-primary mt-3">
                    Browse Products
                </a>
            </div>
        @endif
    </div>
@endsection
