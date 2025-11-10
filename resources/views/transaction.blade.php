@extends('layout.mainLayout')

@section('title', 'My Transactions')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold text-center mb-4">Riwayat Transaksi Saya</h2>

        @if ($transactions->isEmpty())
            <div class="text-center">
                <p class="text-muted">Kamu belum memiliki transaksi.</p>
                <a href="{{ route('products') }}" class="btn btn-primary mt-3">Belanja Sekarang</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center border">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Total Harga</th>
                            <th>Metode Pembayaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $index => $transaction)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $transaction->created_at->format('d M Y - H:i') }}</td>
                                <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                <td>{{ ucfirst($transaction->payment_method) }}</td>
                                <td>
                                    @switch($transaction->status)
                                        @case('pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @break

                                        @case('paid')
                                            <span class="badge bg-info text-dark">Paid</span>
                                        @break

                                        @case('shipped')
                                            <span class="badge bg-primary">Shipped</span>
                                        @break

                                        @case('done')
                                            <span class="badge bg-success">Done</span>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('transactions.show', $transaction) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            Detail
                                        </a>

                                        @if ($transaction->status === 'shipped')
                                            <form action="{{ route('transactions.markAsDone', $transaction) }}"
                                                method="POST" onsubmit="return confirm('Tandai transaksi ini selesai?')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    Done
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
