@extends('layouts.public')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="md:flex">
                <div class="md:flex-shrink-0 md:w-1/2">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-96 w-full object-cover md:h-full">
                    @else
                        @if($product->category == 'glasses')
                            <img src="https://images.unsplash.com/photo-1574258495973-f010dfbb5371?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="{{ $product->name }}" class="h-96 w-full object-cover md:h-full">
                        @else
                            <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="{{ $product->name }}" class="h-96 w-full object-cover md:h-full">
                        @endif
                    @endif
                </div>
                <div class="p-8 md:w-1/2 flex flex-col justify-center">
                    <div class="uppercase tracking-wide text-sm text-primary-600 font-semibold">{{ $product->category }}</div>
                    <h1 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        {{ $product->name }}
                    </h1>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <span class="ml-2 text-sm text-gray-500 line-through">Rp {{ number_format($product->price + 50000, 0, ',', '.') }}</span>
                    </div>
                    <p class="mt-4 text-lg text-gray-500">
                        {{ $product->description }}
                    </p>
                    <div class="mt-8 flex gap-4">
                        <form action="{{ route('shop.checkout', $product->id) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full bg-primary-600 border border-transparent rounded-full py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 shadow-lg shadow-primary-500/30 transition-all">
                                Beli Sekarang
                            </button>
                        </form>
                        <a href="/shop" class="flex-none bg-white border-2 border-gray-200 rounded-full py-3 px-8 flex items-center justify-center text-base font-medium text-gray-700 hover:bg-gray-50 transition-all">
                            Kembali
                        </a>
                    </div>
                    <div class="mt-6 flex items-center text-sm text-gray-500">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Tersedia dalam stok ({{ $product->stock }} item)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
