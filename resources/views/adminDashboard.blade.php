@extends('layout.mainLayout')

@section('title', 'Kelola Transaksi')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4 text-center">📦 Kelola Transaksi</h2>

    @if($transactions->isEmpty())
        <div class="text-center py-4">
            <p class="text-muted">Belum ada transaksi yang tercatat.</p>
        </div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-secondary">
                <tr class="text-center">
                    <th>#</th>
                    <th>Nama User</th>
                    <th>Total Harga</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $index => $transaction)
                <tr class="text-center">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaction->user->name ?? 'User Dihapus' }}</td>
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
                            @default
                                <span class="badge bg-secondary">Unknown</span>
                        @endswitch
                    </td>
                    <td>{{ $transaction->created_at->format('d M Y - H:i') }}</td>
                    <td>
                        <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-sm btn-outline-dark mb-1">
                            Detail
                        </a>

                        @if ($transaction->status === 'pending')
                            <form action="{{ route('transactions.markAsPaid', $transaction) }}" method="POST" class="d-inline">
                                @csrf @method('PUT')
                                <button class="btn btn-sm btn-success">Tandai Paid</button>
                            </form>
                        @elseif ($transaction->status === 'paid')
                            <form action="{{ route('transactions.markAsShipped', $transaction) }}" method="POST" class="d-inline">
                                @csrf @method('PUT')
                                <button class="btn btn-sm btn-primary">Kirim Barang</button>
                            </form>
                        @elseif ($transaction->status === 'shipped')
                            <span class="text-muted">Menunggu konfirmasi user</span>
                        @elseif ($transaction->status === 'done')
                            <span class="text-success fw-semibold">Selesai</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
