@extends('layouts.public')

@section('content')
<div class="bg-gray-50 py-12 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 text-center">
            <h1 class="text-2xl font-bold text-gray-900 mb-4">Simulasi Pembayaran</h1>
            <p class="text-gray-500 mb-6">Total Pembayaran: <span class="font-bold text-gray-900 text-xl">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</span></p>
            
            <div class="bg-blue-50 border border-blue-200 text-blue-700 p-4 rounded-xl mb-6 text-sm text-left">
                Ini adalah halaman simulasi pembayaran. Klik tombol di bawah ini untuk menyelesaikan pembayaran.
            </div>

            <form action="{{ route('shop.payment.process', $transaction->id) }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-green-600 border border-transparent rounded-full py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 shadow-lg shadow-green-500/30 transition-all">
                    Bayar Sekarang
                </button>
            </form>

            <div class="mt-4">
                <a href="/shop" class="text-sm text-gray-500 hover:text-gray-700">Batalkan dan kembali ke toko</a>
            </div>
        </div>
    </div>
</div>
@endsection
