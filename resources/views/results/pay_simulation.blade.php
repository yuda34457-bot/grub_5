<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Simulasi Pembayaran (Non-Midtrans)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden border border-gray-100 text-center py-12 px-6">
                <svg class="mx-auto h-16 w-16 text-primary-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Simulasi Cetak PDF Resmi</h3>
                <p class="text-gray-500 mb-8 max-w-lg mx-auto">Karena Anda belum mengatur akun Midtrans, Anda dapat menggunakan simulasi ini. Klik tombol di bawah untuk menyimulasikan pembayaran sebesar <strong>Rp 20.000</strong> dan langsung mengunduh PDF Anda.</p>
                
                <form action="{{ route('results.success', $result->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-8 py-3 border border-transparent rounded-full shadow-lg text-base font-bold text-white bg-green-600 hover:bg-green-700 transform transition-transform hover:scale-105">
                        <svg class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Simulasikan Pembayaran Berhasil
                    </button>
                </form>

                <div class="mt-6">
                    <a href="{{ route('results.show', $result->id) }}" class="text-sm text-gray-500 hover:text-gray-700 underline">Batal dan Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
