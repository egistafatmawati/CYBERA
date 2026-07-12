@extends('layouts.user')

@section('content')

@php
    $materiId = $quiz->materi_id ?? $quiz->id ?? 1;
    $bannerImage = asset('images/materi ' . $materiId . '.png');
    $jumlahSoal = count($questions ?? []);
@endphp

<div class="bg-[#090F31] min-h-screen w-full">
    <div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 py-8 pb-20">
        
        <!-- Banner Section -->
        <div class="relative w-full rounded-[20px] overflow-hidden mb-12 shadow-xl bg-black">
            <div class="absolute top-0 left-0 w-full h-[350px] z-0">
                <img src="{{ $bannerImage }}" alt="{{ $quiz->judul }}" class="w-full h-full object-cover">
                <!-- Overlay to darken background slightly for text readability -->
                <div class="absolute inset-0 bg-gradient-to-t from-[#090F31]/90 to-[#090F31]/30"></div>
            </div>
            <div class="relative z-10 text-center py-20 px-6 h-[350px] flex flex-col justify-center items-center">
                <h1 class="text-3xl md:text-5xl lg:text-5xl leading-tight mb-4 text-white font-bold tracking-wide" style="font-family: 'Audiowide', sans-serif;">
                    {{ $quiz->judul }}
                </h1>
                <p class="text-gray-200 text-sm md:text-base max-w-3xl mx-auto leading-relaxed">
                    {{ $quiz->deskripsi }}
                </p>
            </div>
        </div>

        @if(!isset($questions) || $questions->isEmpty())
            <!-- Fallback if quiz has no questions -->
            <div class="max-w-[1000px] mx-auto bg-white rounded-[20px] p-8 md:p-12 shadow-2xl text-center text-[#090F31]">
                <div class="flex flex-col items-center justify-center gap-4">
                    <div class="bg-red-100 p-4 rounded-full text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold" style="font-family: 'Audiowide', sans-serif;">Kuis Belum Tersedia</h2>
                    <p class="text-gray-600 max-w-md">Maaf, pertanyaan untuk kuis ini belum dimasukkan oleh administrator. Silakan kembali lagi nanti.</p>
                    <a href="{{ route('user.quiz') }}" class="mt-6 px-10 py-3 bg-[#FFCC00] text-[#090F31] font-bold rounded-full hover:bg-yellow-500 transition-colors shadow-lg text-lg">
                        Kembali
                    </a>
                </div>
            </div>
        @else
            <!-- Intro / Summary Card -->
            <div id="quiz-intro-card" class="max-w-[1000px] mx-auto bg-white rounded-[20px] p-8 md:p-12 shadow-2xl mb-12">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-[#FFCC00] p-2 rounded-lg text-[#090F31] shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl md:text-3xl text-[#090F31] font-bold" style="font-family: 'Audiowide', sans-serif;">
                        Sebelum Memulai
                    </h2>
                </div>

                <ul class="space-y-3 mb-8">
                    <li class="flex items-start gap-3 text-[#090F31] text-base md:text-lg">
                        <span class="text-[#090F31] mt-1.5 text-[10px]">●</span>
                        <span class="font-medium">Terdapat {{ $jumlahSoal }} pertanyaan tentang {{ $quiz->judul }}</span>
                    </li>
                    <li class="flex items-start gap-3 text-[#090F31] text-base md:text-lg">
                        <span class="text-[#090F31] mt-1.5 text-[10px]">●</span>
                        <span class="font-medium">Semua {{ $jumlahSoal }} soal ditampilkan sekaligus dalam satu halaman</span>
                    </li>
                    <li class="flex items-start gap-3 text-[#090F31] text-base md:text-lg">
                        <span class="text-[#090F31] mt-1.5 text-[10px]">●</span>
                        <span class="font-medium">Jawab semua soal, lalu klik Selesai untuk melihat hasil dan review</span>
                    </li>
                </ul>

                <p class="text-[#090F31] text-sm md:text-base leading-relaxed mb-10 opacity-80">
                    Tips: Baca setiap pertanyaan dengan teliti. Pikirkan baik-baik sebelum memilih jawaban.
                    Tidak ada batasan waktu — fokus pada pemahaman, bukan kecepatan.
                </p>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col md:flex-row justify-center gap-6 mt-8">
                <a href="{{ route('user.quiz') }}" class="px-10 py-3 bg-[#FFCC00] text-[#090F31] font-bold rounded-full hover:bg-yellow-500 transition-colors shadow-lg text-lg text-center min-w-[200px]">
                    Kembali
                </a>
                <a href="{{ route('user.quiz.preview.play', $quiz->id) }}" class="px-10 py-3 bg-white text-[#090F31] font-bold rounded-full hover:bg-gray-200 transition-colors shadow-lg text-lg text-center min-w-[200px]">
                    Mulai Kuis
                </a>
            </div>
        @endif

    </div>
</div>

@endsection
