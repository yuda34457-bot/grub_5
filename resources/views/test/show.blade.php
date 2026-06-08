@extends('layouts.public')

@section('content')
<div class="bg-gray-50 min-h-screen py-12" x-data="eyeTest()">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex justify-between items-end mb-2">
                <h2 class="text-lg font-bold text-gray-900 capitalize">Tes {{ str_replace('_', ' ', $type) }}</h2>
                <span class="text-sm font-medium text-gray-500">Langkah <span x-text="currentStep + 1"></span> dari <span x-text="questions.length"></span></span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div class="bg-primary-600 h-2.5 rounded-full transition-all duration-300" :style="'width: ' + ((currentStep + 1) / questions.length * 100) + '%'"></div>
            </div>
        </div>

        <!-- Question Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="/test/{{ $type }}/submit" method="POST" id="testForm">
                @csrf
                <div class="p-8 sm:p-12">
                    
                    <template x-for="(q, index) in questions" :key="index">
                        <div x-show="currentStep === index" x-transition.opacity.duration.300ms>
                            <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center" x-text="q.text"></h3>
                            
                            <!-- Image for Test -->
                            <div class="w-full h-80 bg-white rounded-xl mb-8 flex items-center justify-center overflow-hidden border border-gray-200 shadow-inner">
                                <img :src="q.image" alt="Test Image" class="max-h-full object-contain" x-show="q.image">
                                <span class="text-gray-400 font-medium" x-show="!q.image" x-text="'[' + q.type + ' Image Placeholder]'"></span>
                            </div>

                            <div class="space-y-4">
                                <template x-for="(option, optIndex) in q.options" :key="optIndex">
                                    <label class="flex items-center p-4 border rounded-xl cursor-pointer transition-colors"
                                           :class="answers[index] === option ? 'border-primary-500 bg-primary-50' : 'border-gray-200 hover:border-primary-300'">
                                        <input type="radio" :name="'answers[' + index + ']'" :value="option" x-model="answers[index]" class="hidden">
                                        <div class="w-5 h-5 rounded-full border flex items-center justify-center mr-4"
                                             :class="answers[index] === option ? 'border-primary-500' : 'border-gray-300'">
                                            <div class="w-2.5 h-2.5 rounded-full bg-primary-500" x-show="answers[index] === option"></div>
                                        </div>
                                        <span class="text-gray-700 font-medium" x-text="option"></span>
                                    </label>
                                </template>
                            </div>
                        </div>
                    </template>

                </div>
                <div class="px-8 py-6 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                    <button type="button" @click="prev()" x-show="currentStep > 0" class="px-6 py-2 border border-gray-300 rounded-full text-gray-700 hover:bg-gray-100 font-medium transition-colors">
                        Sebelumnya
                    </button>
                    <div x-show="currentStep === 0"></div> <!-- spacer -->
                    
                    <button type="button" @click="next()" x-show="currentStep < questions.length - 1" class="px-8 py-2.5 bg-primary-600 rounded-full text-white hover:bg-primary-700 font-medium transition-colors shadow-md">
                        Lanjut
                    </button>
                    
                    <button type="submit" x-show="currentStep === questions.length - 1" class="px-8 py-2.5 bg-green-600 rounded-full text-white hover:bg-green-700 font-medium transition-colors shadow-md">
                        Selesaikan Tes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Load AlpineJS -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('eyeTest', () => ({
            type: '{{ $type }}',
            currentStep: 0,
            answers: {},
            questions: [],

            init() {
                if (this.type === 'visus') {
                    const visusOptions = ['Baris 5 (P E C F D) - 20/20', 'Baris 4 (L P E D) - 20/30', 'Baris 3 (T O Z) - 20/40', 'Baris 2 (F P) - 20/50', 'Tidak bisa membaca dengan jelas'];
                    this.questions = [
                        { text: 'Baca huruf pada grafik dari atas ke bawah. Apa baris terendah yang bisa Anda baca dengan jelas?', type: 'Snellen', image: '/images/test/snellen.svg', options: visusOptions },
                        { text: 'Tutup mata KIRI Anda. Apa baris terendah yang bisa Anda baca dengan jelas dengan mata KANAN Anda?', type: 'Mata Kanan', image: '/images/test/snellen.svg', options: visusOptions },
                        { text: 'Tutup mata KANAN Anda. Apa baris terendah yang bisa Anda baca dengan jelas dengan mata KIRI Anda?', type: 'Mata Kiri', image: '/images/test/snellen.svg', options: visusOptions }
                    ];
                } else if (this.type === 'color_blind') {
                    this.questions = [
                        { text: 'Angka berapa yang Anda lihat pada gambar ini?', type: 'Ishihara Plate 1', image: '/images/test/ishihara1.svg', options: ['12', '74', 'Saya tidak melihat angka'] },
                        { text: 'Angka berapa yang Anda lihat pada gambar ini?', type: 'Ishihara Plate 2', image: '/images/test/ishihara2.svg', options: ['74', '21', 'Saya tidak melihat angka'] },
                        { text: 'Angka berapa yang Anda lihat pada gambar ini?', type: 'Ishihara Plate 3', image: '/images/test/ishihara3.svg', options: ['8', '3', 'Saya tidak melihat angka'] }
                    ];
                } else if (this.type === 'astigmatism') {
                    this.questions = [
                        { text: 'Lihat garis-garis yang memancar. Apakah beberapa garis tampak lebih gelap atau lebih tajam dari yang lain?', type: 'Astigmatism Dial', image: '/images/test/astigmatism.svg', options: ['Ya, beberapa garis lebih gelap', 'Tidak, semua garis terlihat sama'] },
                        { text: 'Tutup satu mata. Apakah gambar masih terlihat terdistorsi/berbayang?', type: 'Satu Mata', image: '/images/test/astigmatism.svg', options: ['Ya, masih terdistorsi', 'Tidak, terlihat normal sekarang'] }
                    ];
                }
            },

            next() {
                if (!this.answers[this.currentStep]) {
                    alert('Silakan pilih jawaban untuk melanjutkan.');
                    return;
                }
                if (this.currentStep < this.questions.length - 1) {
                    this.currentStep++;
                }
            },

            prev() {
                if (this.currentStep > 0) {
                    this.currentStep--;
                }
            }
        }));
    });
</script>
@endsection
