@extends('layouts.user')

@section('content')
<style>
    footer { display: none !important; }
</style>

@php
    $judulSimulasi = 'Simulasi ' . ($materi->judul ?? 'Keamanan Siber');
    // Decode JSON string to array if it is a string
    $skenarios = is_string($simulasi->skenario) ? json_decode($simulasi->skenario, true) : ($simulasi->skenario ?? []);
@endphp

<div class="min-h-screen flex flex-col">
    @if(count($skenarios) > 0)
        @foreach($skenarios as $index => $skenario)
        <!-- Skenario Container -->
        <div id="skenario-{{ $index }}" class="skenario-container {{ $index > 0 ? 'hidden' : 'flex' }} flex-col min-h-screen w-full">
            
            <!-- Top Dark Section -->
            <div class="bg-[#090F31] pt-8 pb-12 flex-none">
                <div class="w-full max-w-4xl mx-auto px-6">
                    <!-- Header / Back Button -->
                    <div class="flex items-center gap-4 mb-8">
                        <a href="{{ route('user.simulasi.show', ['materi' => $materi->id]) }}" class="flex items-center gap-2 text-[#FFCC00] font-bold hover:text-yellow-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Keluar
                        </a>
                    </div>

                    <!-- Skenario Box -->
                    <div class="border border-gray-400 rounded-xl p-6 md:p-8 bg-slate-800 shadow-lg text-gray-200">
                        @if(isset($skenario['percakapan']) && count($skenario['percakapan']) > 0)
                            <!-- Layout Bubble Chat -->
                            <div class="space-y-6 mb-4 text-left">
                                <p class="text-gray-300 border-b border-gray-600 pb-4 mb-4 text-sm">{{ $skenario['skenario_teks'] ?? $skenario['konten'] ?? '' }}</p>
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
                            <!-- Layout Teks Biasa (Email dll) -->
                            <div class="space-y-4">
                                <div class="leading-relaxed whitespace-pre-wrap text-[15px] text-left">
                                    @php
                                        // Replace the dashed line from seeder with an actual <hr> for better visual
                                        $konten = $skenario['skenario_teks'] ?? $skenario['konten'] ?? '';
                                        $konten = preg_replace('/-{10,}/', '<hr class="border-gray-500 my-4">', $konten);
                                        // Strip leading spaces from each line in case it was copy-pasted with indentations
                                        $konten = preg_replace('/^[ \t]+/m', '', $konten);
                                    @endphp
                                    {!! $konten !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Bottom White Section -->
            <div class="bg-white flex-grow pt-10 pb-32">
                <div class="w-full max-w-4xl mx-auto px-6">
                    
                    <h3 class="text-xl font-bold text-black mb-6">{{ $skenario['pertanyaan'] ?? 'Pertanyaan' }}</h3>

                    <!-- Opsi Jawaban -->
                    <div class="flex flex-col gap-4 mb-8" id="opsi-container-{{ $index }}">
                        @php
                            $huruf = ['A', 'B', 'C', 'D', 'E'];
                        @endphp
                        @foreach($skenario['opsi'] as $oIndex => $opsi)
                            @php
                                $idx = $loop->index;
                                $jawabanBenar = $skenario['jawaban_benar'] ?? '';
                                $is_benar = false;
                                
                                if (is_numeric($jawabanBenar)) {
                                    $is_benar = (int) $jawabanBenar === $idx;
                                } else {
                                    $is_benar = strtoupper($jawabanBenar) === ($huruf[$idx] ?? '');
                                    // Fallback jika jawaban_benar persis sama dengan key aslinya
                                    if (!$is_benar && (string)$jawabanBenar === (string)$oIndex) {
                                        $is_benar = true;
                                    }
                                }
                            @endphp
                            <button type="button" 
                                onclick="jawab({{ $index }}, {{ $idx }}, {{ $is_benar ? 'true' : 'false' }})"
                                id="btn-{{ $index }}-{{ $idx }}"
                                class="opsi-btn text-left px-6 py-4 rounded-xl border border-black bg-[#E5E7EB] text-black font-medium transition-all hover:bg-gray-300 flex items-center shadow-sm">
                                <span class="mr-3 font-bold">{{ $huruf[$idx] ?? ($idx + 1) }}.</span> 
                                {{ $opsi }}
                            </button>
                        @endforeach
                    </div>

                    <!-- Penjelasan (Awalnya Sembunyi) -->
                    <div id="penjelasan-{{ $index }}" class="hidden border border-black rounded-xl p-6 bg-white shadow-sm mb-8 transition-all relative">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="bg-[#090F31] text-white w-8 h-8 rounded-lg flex items-center justify-center font-bold text-xl">!</div>
                            <h4 class="font-bold text-2xl text-[#090F31]" style="font-family: 'Audiowide', sans-serif;">Penjelasan</h4>
                        </div>
                        <p class="text-gray-800 text-[15px] leading-relaxed">
                            {{ $skenario['penjelasan'] ?? '' }}
                        </p>
                    </div>

                    <!-- Tombol Navigasi Berikutnya -->
                    <div class="flex justify-end hidden" id="navigasi-{{ $index }}">
                        @if($index < count($skenarios) - 1)
                            <button type="button" onclick="nextSkenario({{ $index }})" class="bg-[#090F31] text-[#FFCC00] font-bold px-10 py-3 rounded-full hover:bg-blue-900 transition-colors shadow-sm">
                                Berikutnya
                            </button>
                        @else
                            <a href="{{ route('user.simulasi.show', ['materi' => $materi->id]) }}" class="bg-[#090F31] text-[#FFCC00] font-bold px-10 py-3 rounded-full hover:bg-blue-900 transition-colors shadow-sm">
                                Selesai
                            </a>
                        @endif
                    </div>

                </div>
            </div>
            
        </div>
        @endforeach
    @else
        <!-- Fallback if no scenarios -->
        <div class="bg-[#090F31] min-h-screen flex items-center justify-center">
            <div class="bg-white rounded-xl p-10 text-center shadow-lg max-w-md mx-auto">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Skenario belum tersedia.</h3>
                <p class="text-gray-600 mb-6">Materi simulasi ini belum memiliki skenario yang bisa dimainkan.</p>
                <a href="{{ route('user.simulasi.show', ['materi' => $materi->id]) }}" class="bg-[#FFCC00] text-[#090F31] font-bold px-8 py-3 rounded-full hover:bg-yellow-500 transition-colors shadow-lg">
                    Kembali
                </a>
            </div>
        </div>
    @endif
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
        buttons.forEach((btn, idx) => {
            btn.classList.add('cursor-not-allowed');
            btn.classList.remove('hover:bg-gray-300');
            
            // Check if this button is the correct answer to highlight it anyway (optional)
            // But per Figma, we highlight what the user clicked.
        });

        // Highlight the clicked button
        const clickedBtn = document.getElementById(`btn-${indexSkenario}-${opsiId}`);
        
        if (isBenar) {
            // Hijau (Figma: #00E050 / Bright Green)
            clickedBtn.classList.remove('bg-[#E5E7EB]', 'border-black');
            clickedBtn.classList.add('bg-[#00E050]', 'border-[#00E050]');
        } else {
            // Merah (Figma: #CC0000 / Red)
            clickedBtn.classList.remove('bg-[#E5E7EB]', 'border-black');
            clickedBtn.classList.add('bg-[#CC0000]', 'border-[#CC0000]', 'text-white');
        }

        // Tampilkan Penjelasan
        const penjelasan = document.getElementById(`penjelasan-${indexSkenario}`);
        penjelasan.classList.remove('hidden');
        penjelasan.classList.add('animate-fade-in-up');

        // Tampilkan Tombol Berikutnya
        const navigasi = document.getElementById(`navigasi-${indexSkenario}`);
        navigasi.classList.remove('hidden');
    }

    function nextSkenario(currentIndex) {
        document.getElementById(`skenario-${currentIndex}`).classList.remove('flex');
        document.getElementById(`skenario-${currentIndex}`).classList.add('hidden');
        
        document.getElementById(`skenario-${currentIndex + 1}`).classList.remove('hidden');
        document.getElementById(`skenario-${currentIndex + 1}`).classList.add('flex');
        
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
