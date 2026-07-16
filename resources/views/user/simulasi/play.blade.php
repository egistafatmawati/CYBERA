@extends('layouts.user')

@section('content')

@php
    $judulSimulasi = 'Simulasi ' . ($materi->judul ?? 'Keamanan Siber');
    $skenarios = $simulasi->skenario ?? [];
@endphp

<!-- Dark Wrapper -->
<div class="bg-[#090F31] min-h-screen pt-8 pb-32">
    <div class="w-full max-w-[800px] mx-auto px-6">
        
        <!-- Header / Back Button -->
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('user.simulasi.show', ['materi' => $materi->id]) }}" class="flex items-center gap-2 text-[#FFCC00] font-bold hover:text-yellow-400 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Keluar
            </a>
            <div class="text-white font-bold tracking-wide">{{ $judulSimulasi }}</div>
        </div>

        @if(count($skenarios) > 0)
            @foreach($skenarios as $index => $skenario)
            <!-- Kotak Skenario Utama (Hanya Tampilkan Yang Aktif) -->
            <div id="skenario-{{ $index }}" class="skenario-container {{ $index > 0 ? 'hidden' : '' }}">
                
                <!-- Skenario Box -->
                <div class="border border-[#4B5563] rounded-xl p-6 md:p-8 mb-8 bg-[#1F2937]/50 shadow-lg text-gray-200">
                    @if(isset($skenario['percakapan']) && count($skenario['percakapan']) > 0)
                        <!-- Layout Bubble Chat -->
                        <div class="space-y-6 mb-4">
                            <p class="text-gray-300 border-b border-gray-600 pb-4 mb-4 text-sm">{{ $skenario['skenario_teks'] }}</p>
                            @foreach($skenario['percakapan'] as $chat)
                                <div class="flex flex-col {{ (strtolower($chat['pengirim']) == 'anda') ? 'items-end' : 'items-start' }}">
                                    <span class="text-xs text-gray-400 mb-1 px-1">{{ $chat['pengirim'] }}</span>
                                    <div class="px-4 py-3 rounded-2xl max-w-[85%] shadow-md {{ (strtolower($chat['pengirim']) == 'anda') ? 'bg-[#FFCC00] text-[#090F31] rounded-tr-none font-medium' : 'bg-[#374151] text-gray-200 rounded-tl-none' }}">
                                        {{ $chat['pesan'] }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Layout Teks Biasa -->
                        <div class="space-y-4">
                            <div class="leading-relaxed whitespace-pre-wrap">
                                {{ $skenario['skenario_teks'] }}
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Pertanyaan Base Container (White Box style from image) -->
                <div class="bg-white text-black p-6 md:p-10 rounded-xl shadow-xl mt-4 relative z-10 -mx-4 md:mx-0">
                    
                    <h3 class="text-lg md:text-xl font-bold mb-6">{{ $skenario['pertanyaan'] }}</h3>

                    <!-- Opsi Jawaban -->
                    <div class="flex flex-col gap-4 mb-8" id="opsi-container-{{ $index }}">
                        @php
                            $huruf = ['A', 'B', 'C', 'D', 'E'];
                        @endphp
                        @foreach($skenario['opsi'] as $oIndex => $opsi)
                            @php
                                $is_benar = (int) $skenario['jawaban_benar'] === $oIndex;
                            @endphp
                            <button type="button" 
                                onclick="jawab({{ $index }}, {{ $oIndex }}, {{ $is_benar ? 'true' : 'false' }})"
                                id="btn-{{ $index }}-{{ $oIndex }}"
                                class="opsi-btn text-left px-6 py-4 rounded-lg border-2 border-gray-300 font-medium transition-all hover:border-[#FFCC00] hover:text-[#FFCC00] flex items-center">
                                <span class="mr-3 font-bold">{{ $huruf[$oIndex] ?? ($oIndex + 1) }}.</span> 
                                {{ $opsi }}
                            </button>
                        @endforeach
                    </div>

                    <!-- Penjelasan (Awalnya Sembunyi) -->
                    <div id="penjelasan-{{ $index }}" class="hidden border-2 border-gray-200 rounded-xl p-6 bg-gray-50 mb-8 transition-all">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-[#090F31] text-white w-8 h-8 rounded flex items-center justify-center font-bold text-lg">!</div>
                            <h4 class="font-bold text-xl text-[#090F31]" style="font-family: 'Audiowide', sans-serif;">Penjelasan</h4>
                        </div>
                        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">
                            {{ $skenario['penjelasan'] }}
                        </p>
                    </div>

                    <!-- Tombol Navigasi Berikutnya -->
                    <div class="flex justify-end hidden" id="navigasi-{{ $index }}">
                        @if($index < count($skenarios) - 1)
                            <button type="button" onclick="nextSkenario({{ $index }})" class="bg-[#090F31] text-[#FFCC00] font-bold px-8 py-3 rounded-full hover:bg-blue-900 transition-colors shadow-lg">
                                Berikutnya
                            </button>
                        @else
                            <a href="{{ route('user.simulasi.show', ['materi' => $materi->id]) }}" class="bg-[#FFCC00] text-[#090F31] font-bold px-8 py-3 rounded-full hover:bg-yellow-500 transition-colors shadow-lg">
                                Selesai Simulasi
                            </a>
                        @endif
                    </div>

                </div>
            </div>
            @endforeach
        @else
            <div class="bg-white rounded-xl p-10 text-center shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Skenario belum tersedia.</h3>
                <p class="text-gray-600 mb-6">Materi simulasi ini belum memiliki skenario yang bisa dimainkan.</p>
                <a href="{{ route('user.simulasi.show', ['materi' => $materi->id]) }}" class="bg-[#FFCC00] text-[#090F31] font-bold px-8 py-3 rounded-full hover:bg-yellow-500 transition-colors shadow-lg">
                    Kembali
                </a>
            </div>
        @endif

    </div>
</div>

@push('scripts')
<script>
    // Menyimpan state agar user hanya bisa jawab 1 kali per skenario
    let answered = {};

    function jawab(indexSkenario, opsiId, isBenar) {
        if (answered[indexSkenario]) return; // Sudah jawab

        answered[indexSkenario] = true;
        
        const container = document.getElementById(`opsi-container-${indexSkenario}`);
        const buttons = container.querySelectorAll('.opsi-btn');

        // Reset all buttons style first (disable them)
        buttons.forEach(btn => {
            btn.classList.add('opacity-50', 'cursor-not-allowed');
            btn.classList.remove('hover:border-[#FFCC00]', 'hover:text-[#FFCC00]');
        });

        // Highlight the clicked button
        const clickedBtn = document.getElementById(`btn-${indexSkenario}-${opsiId}`);
        clickedBtn.classList.remove('opacity-50');
        
        if (isBenar) {
            // Hijau
            clickedBtn.classList.remove('border-gray-300');
            clickedBtn.classList.add('bg-[#00E050]', 'border-[#00E050]', 'text-[#090F31]', 'shadow-lg');
        } else {
            // Merah
            clickedBtn.classList.remove('border-gray-300');
            clickedBtn.classList.add('bg-[#CC0000]', 'border-[#CC0000]', 'text-white', 'shadow-lg');
            
            // Cari tombol yang benar dan beri warna hijau (opsional untuk memberitahu yang benar)
            // Di desain ini kita bisa highlight yang benar juga.
        }

        // Tampilkan Penjelasan
        const penjelasan = document.getElementById(`penjelasan-${indexSkenario}`);
        penjelasan.classList.remove('hidden');
        penjelasan.classList.add('animate-fade-in-up'); // Tailwind animation class jika ada

        // Tampilkan Tombol Berikutnya
        const navigasi = document.getElementById(`navigasi-${indexSkenario}`);
        navigasi.classList.remove('hidden');
    }

    function nextSkenario(currentIndex) {
        document.getElementById(`skenario-${currentIndex}`).classList.add('hidden');
        document.getElementById(`skenario-${currentIndex + 1}`).classList.remove('hidden');
        // Scroll to top of scenario box
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>

<style>
    .animate-fade-in-up {
        animation: fadeInUp 0.5s ease-out forwards;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@endsection
