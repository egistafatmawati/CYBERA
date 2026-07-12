@extends('layouts.user')

@section('content')
<div class="bg-[#090F31] min-h-screen w-full pt-8 pb-32">
    <div class="w-full max-w-[1000px] mx-auto px-6">
        
        <div class="mb-8">
            <a href="{{ route('user.quiz') }}" class="text-[#FFCC00] font-bold text-sm flex items-center hover:text-yellow-400 transition-colors">
                <span class="mr-2">←</span> Kembali
            </a>
        </div>

        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl text-white font-bold mb-2" style="font-family: 'Audiowide', sans-serif;">
                Kuis Selesai!
            </h1>
            <p class="text-gray-400 text-sm md:text-base mb-2">Nilai Anda</p>
            <div class="text-4xl md:text-5xl text-white font-bold" style="font-family: 'Audiowide', sans-serif;">
                {{ $quizResult->skor }}/100
            </div>
        </div>

        <div class="space-y-6">
            @foreach($quizResult->details as $index => $detail)
                @php
                    $question = $detail->question;
                    // Note: This relies on lazy loading if not eager loaded by backend
                    $options = $question->options ?? collect(); 
                @endphp
                <div class="bg-[#1e2443] text-white p-6 md:p-8 rounded-xl border border-[#333a64] shadow-lg">
                    <h3 class="text-base md:text-lg font-bold mb-6 flex items-start gap-2">
                        <span class="shrink-0">{{ $index + 1 }}.</span>
                        <span>{{ $question->pertanyaan }}</span>
                    </h3>

                    <div class="grid grid-cols-1 gap-4">
                        @foreach($options as $opsi)
                            @php
                                $isUserAnswer = ($detail->jawaban_user === $opsi->kode);
                                $isCorrectAnswer = ($question->jawaban_benar === $opsi->kode);
                                
                                $bgClass = 'bg-[#1e2443] hover:bg-[#2a325a]';
                                $borderClass = 'border-gray-500';
                                $textClass = 'text-gray-300';

                                if ($isCorrectAnswer) {
                                    $bgClass = 'bg-[#00c853]'; // Bright green
                                    $borderClass = 'border-[#00c853]';
                                    $textClass = 'text-white font-bold';
                                } elseif ($isUserAnswer && !$detail->is_correct) {
                                    $bgClass = 'bg-[#d50000]'; // Red for wrong answer
                                    $borderClass = 'border-[#d50000]';
                                    $textClass = 'text-white font-bold';
                                }
                            @endphp
                            <div class="flex items-center px-6 py-4 rounded-lg border {{ $borderClass }} {{ $bgClass }} {{ $textClass }} text-sm md:text-base transition-colors">
                                <span class="mr-3 font-bold">{{ $opsi->kode }}.</span> 
                                <span>{{ $opsi->teks_opsi }}</span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Penjelasan Box -->
                    <div class="mt-8 border border-[#FFCC00]/50 bg-[#FFCC00]/10 rounded-lg p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-[#FFCC00] text-[#090F31] w-6 h-6 rounded flex items-center justify-center font-bold text-sm">
                                !
                            </div>
                            <h4 class="font-bold text-lg text-[#FFCC00]" style="font-family: 'Audiowide', sans-serif;">Penjelasan</h4>
                        </div>
                        <p class="text-[#FFCC00] text-sm md:text-base leading-relaxed">
                            {{ $question->penjelasan ?? 'Penjelasan detail mengenai soal ini akan ditampilkan di sini oleh sistem saat tersedia di database.' }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-between items-center mt-12 mb-8">
            <a href="{{ route('user.quiz.preview', $quizResult->quiz_id) }}" class="px-10 py-3 bg-[#FFCC00] text-[#090F31] font-bold rounded-full hover:bg-yellow-500 transition-colors shadow-lg text-sm md:text-base">
                Coba Lagi
            </a>
            <a href="{{ route('user.quiz') }}" class="px-10 py-3 bg-[#FFCC00] text-[#090F31] font-bold rounded-full hover:bg-yellow-500 transition-colors shadow-lg text-sm md:text-base">
                Selesai
            </a>
        </div>

    </div>
</div>
@endsection
