@extends('layouts.public')

@section('content')
<div class="bg-white py-12 lg:py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <span class="inline-block px-3 py-1 rounded-full bg-primary-50 text-primary-600 font-medium text-sm mb-4">
                {{ $article->category }}
            </span>
            <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl lg:text-5xl">
                {{ $article->title }}
            </h1>
            <p class="mt-4 text-sm text-gray-500">
                Dipublikasikan pada {{ $article->created_at->format('d M Y') }}
            </p>
        </div>

        <div class="rounded-2xl overflow-hidden shadow-lg mb-10">
            @if($article->image)
                <img class="w-full h-auto object-cover" src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
            @else
                @if($article->category == 'Edukasi')
                    <img class="w-full h-auto object-cover" src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="{{ $article->title }}">
                @else
                    <img class="w-full h-auto object-cover" src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="{{ $article->title }}">
                @endif
            @endif
        </div>

        <div class="prose prose-blue prose-lg max-w-none text-gray-700 leading-relaxed">
            {!! nl2br(e($article->content)) !!}
        </div>

        <div class="mt-12 pt-8 border-t border-gray-200">
            <a href="/articles" class="inline-flex items-center text-primary-600 font-medium hover:text-primary-800 transition-colors">
                <svg class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar Artikel
            </a>
        </div>
    </div>
</div>
@endsection
