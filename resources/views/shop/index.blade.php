@extends('layouts.public')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">Toko VisionMe</h1>
            <p class="mt-4 text-xl text-gray-500">Kacamata premium, lensa kontak, dan aksesori perawatan mata.</p>
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($products as $product)
                <div class="group relative bg-white border border-gray-200 rounded-2xl p-4 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-full min-h-60 bg-gray-100 aspect-w-1 aspect-h-1 rounded-xl overflow-hidden group-hover:opacity-75 lg:h-60 lg:aspect-none relative">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                        @else
                            @if($product->category == 'glasses')
                                <img src="https://images.unsplash.com/photo-1574258495973-f010dfbb5371?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="{{ $product->name }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                            @else
                                <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="{{ $product->name }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                            @endif
                        @endif
                        <div class="absolute top-2 right-2 bg-white px-2 py-1 rounded-md text-xs font-bold text-gray-700 shadow-sm uppercase tracking-wide">
                            {{ $product->category }}
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">
                                <a href="/shop/{{ $product->id }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 line-clamp-2">{{ $product->description }}</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <p class="text-xl font-bold text-primary-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada produk</h3>
                <p class="mt-1 text-sm text-gray-500">Kami sedang memperbarui katalog kami. Silakan periksa kembali nanti!</p>
            </div>
        @endif
    </div>
</div>
@endsection
