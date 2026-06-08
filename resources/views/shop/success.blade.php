@extends('layouts.public')

@section('content')
<div class="bg-gray-50 py-12 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 text-center">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Pembayaran Berhasil!</h1>
            <p class="text-gray-500 mb-8">Terima kasih atas pesanan Anda. Kami akan segera memproses pengiriman produk Anda.</p>
            
            <a href="/shop" class="w-full inline-block bg-primary-600 border border-transparent rounded-full py-3 px-8 text-base font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 shadow-lg shadow-primary-500/30 transition-all">
                Lanjutkan Belanja
            </a>
            
            <div class="mt-4">
                <a href="/dashboard" class="text-sm text-gray-500 hover:text-gray-700">Ke Dashboard Saya</a>
            </div>
        </div>
    </div>
</div>
@endsection
