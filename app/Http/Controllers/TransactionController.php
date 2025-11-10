<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
        }

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('checkout', compact('cartItems', 'total'));
    }

    public function pay(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:qris,transfer',
        ]);

        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
        }

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        $productsData = $cartItems->map(fn($item) => [
            'product_id' => $item->product_id,
            'product_name' => $item->product->name,
            'price' => $item->product->price,
            'quantity' => $item->quantity,
        ]);

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'products' => $productsData,
            'total_price' => $total,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('transactions.show', $transaction->id)
            ->with('success', 'Silakan konfirmasi pembayaran Anda.');
    }

    public function markAsPaid(Transaction $transaction)
    {
        $transaction->update(['status' => 'paid']);
        return redirect()->back()->with('success', 'Status transaksi diubah menjadi Paid.');
    }

    public function markAsShipped(Transaction $transaction)
    {
        $transaction->update(['status' => 'shipped']);
        return redirect()->back()->with('success', 'Pesanan sedang dikirim ke pelanggan.');
    }

    public function markAsDone(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403, 'Tidak diizinkan.');
        }

        if ($transaction->status !== 'shipped') {
            return redirect()->back()->with('error', 'Pesanan belum dikirim, tidak bisa ditandai selesai.');
        }

        $transaction->update(['status' => 'done']);

        return redirect()->back()->with('success', 'Pesanan berhasil diselesaikan.');
    }



    public function show(Transaction $transaction)
    {
        $transaction->load('user');
        return view('transactionDetail', compact('transaction'));
    }

    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->latest()
            ->get();
        return view('transaction', compact('transactions'));
    }

    public function adminIndex()
    {
        $transactions = Transaction::with('user')->latest()->get();

        return view('adminDashboard', compact('transactions'));
    }
}
