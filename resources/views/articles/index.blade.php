@extends('layouts.public')

@section('content')
<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">Blog Kesehatan Mata</h1>
            <p class="mt-4 text-xl text-gray-500">Dapatkan tips, berita, dan panduan terbaru untuk menjaga kesehatan penglihatan Anda.</p>
        </div>

        @if($articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $article)
                <article class="flex flex-col bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <div class="flex-shrink-0 h-48 w-full bg-gray-100 relative">
                        @if($article->image)
                            <img class="h-full w-full object-cover" src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                        @else
                            @if($article->category == 'Edukasi')
                                <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="{{ $article->title }}">
                            @else
                                <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="{{ $article->title }}">
                            @endif
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-primary-100 text-primary-800">
                                {{ $article->category }}
                            </span>
                        </div>
                    </div>
                    <div class="flex-1 p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <a href="/articles/{{ $article->id }}" class="block mt-2">
                                <h3 class="text-xl font-bold text-gray-900 hover:text-primary-600 transition-colors">{{ $article->title }}</h3>
                                <p class="mt-3 text-base text-gray-500 line-clamp-3">
                                    {{ Str::limit(strip_tags($article->content), 150) }}
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <span class="sr-only">{{ $article->author->name ?? 'Admin' }}</span>
                                <div class="h-10 w-10 rounded-full bg-primary-600 flex items-center justify-center text-white font-bold">
                                    {{ substr($article->author->name ?? 'A', 0, 1) }}
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ $article->author->name ?? 'Admin' }}
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="{{ $article->created_at->format('Y-m-d') }}">
                                        {{ $article->created_at->format('M d, Y') }}
                                    </time>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 bg-gray-50 rounded-2xl border border-gray-100">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15M9 11l3 3m0 0l3-3m-3 3V8" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada artikel</h3>
                <p class="mt-1 text-sm text-gray-500">Blog kami saat ini kosong. Kami akan segera menerbitkan konten baru!</p>
            </div>
        @endif
    </div>
</div>
@endsection
