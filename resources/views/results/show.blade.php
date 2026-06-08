<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test Result Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden border border-gray-100">
                <div class="p-8">
                    @if (session('error'))
                        <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="mb-4 bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-lg flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-start border-b border-gray-200 pb-6 mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 capitalize">{{ str_replace('_', ' ', $result->eyeTest->type) }} Test</h3>
                            <p class="text-sm text-gray-500 mt-1">Taken on {{ $result->created_at->format('F d, Y \a\t H:i') }}</p>
                        </div>
                        <div>
                            @if($result->is_printed)
                                <a href="{{ route('results.download', $result->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700">
                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Download PDF
                                </a>
                            @else
                                <form action="{{ route('results.pay', $result->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700">
                                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                        </svg>
                                        Cetak PDF (Rp 20.000)
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                            <h4 class="text-sm font-bold text-blue-800 uppercase tracking-wide mb-2">Left Eye (OS) Score</h4>
                            <p class="text-3xl font-extrabold text-blue-600">{{ $result->left_eye_score ?? 'N/A' }}</p>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                            <h4 class="text-sm font-bold text-blue-800 uppercase tracking-wide mb-2">Right Eye (OD) Score</h4>
                            <p class="text-3xl font-extrabold text-blue-600">{{ $result->right_eye_score ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Diagnosis</h4>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 text-gray-700">
                            {{ $result->diagnosis }}
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Recommendation</h4>
                        <div class="bg-green-50 p-4 rounded-lg border border-green-200 text-green-800 flex items-start">
                            <svg class="h-6 w-6 text-green-600 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p>{{ $result->recommendation }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
