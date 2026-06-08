<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Online Consultation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                  <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden border border-gray-100 mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Start a new consultation</h3>
                    <form action="{{ route('consultation.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Your Message</label>
                            <textarea id="message" name="message" rows="4" class="mt-1 shadow-sm focus:ring-primary-500 focus:border-primary-500 block w-full sm:text-sm border border-gray-300 rounded-md p-3" placeholder="Describe your eye condition or ask a question about your test result..."></textarea>
                            @error('message')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-right">
                            <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <h3 class="text-xl font-bold text-gray-900 mb-4">Your Consultation History</h3>
            
            <div class="space-y-6">
                @forelse($consultations as $consultation)
                    <div class="bg-white shadow-sm sm:rounded-lg border border-gray-100 p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500">{{ $consultation->created_at->format('M d, Y h:i A') }}</span>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $consultation->status == 'open' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($consultation->status) }}
                            </span>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 text-gray-700 mb-4 border border-gray-200">
                            <strong>You:</strong><br>
                            {{ $consultation->message }}
                        </div>
                        
                        @if($consultation->reply)
                            <div class="bg-primary-50 rounded-lg p-4 text-primary-900 border border-primary-200 ml-8">
                                <strong>Optometrist ({{ $consultation->optometrist->name ?? 'Doctor' }}):</strong><br>
                                {{ $consultation->reply }}
                            </div>
                        @else
                            <div class="text-sm text-gray-500 italic ml-8">Waiting for response...</div>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-12 bg-gray-50 rounded-xl border border-gray-200 border-dashed">
                        <p class="text-gray-500">You have no active consultations.</p>
                    </div>
                @endforelse
            </div>
            
        </div>
    </div>
</x-app-layout>
