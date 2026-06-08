<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Complete Payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden border border-gray-100 text-center py-12 px-6">
                <svg class="mx-auto h-16 w-16 text-primary-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Print Official PDF Result</h3>
                <p class="text-gray-500 mb-8 max-w-lg mx-auto">You are about to pay <strong>Rp 50.000</strong> to get an official PDF print of your {{ str_replace('_', ' ', $result->eyeTest->type) }} test result. Proceed to payment below.</p>
                
                <button id="pay-button" class="inline-flex items-center px-8 py-3 border border-transparent rounded-full shadow-lg text-base font-bold text-white bg-primary-600 hover:bg-primary-700 transform transition-transform hover:scale-105">
                    Pay Now
                </button>
            </div>
        </div>
    </div>

    <!-- Midtrans Snap -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client-DUMMYKEY') }}"></script>
    <script>
      document.getElementById('pay-button').onclick = function(){
        snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            alert("Payment success!");
            
            // Ping the backend to mark it as paid for local development
            fetch("{{ route('results.success', $result->id) }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(() => {
                window.location.href = "{{ route('results.show', $result->id) }}";
            });
          },
          onPending: function(result){
            alert("Waiting for your payment!"); console.log(result);
          },
          onError: function(result){
            alert("Payment failed!"); console.log(result);
          },
          onClose: function(){
            alert('You closed the popup without finishing the payment');
          }
        })
      };
    </script>
</x-app-layout>
