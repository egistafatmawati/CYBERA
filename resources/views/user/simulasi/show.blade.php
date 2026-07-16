@extends('layouts.user')

@section('content')

@php
    $tips = [
        'Perhatikan baik-baik setiap detail pada skenario yang diberikan.',
        'Waspadai taktik manipulasi psikologis (social engineering) seperti urgensi palsu.',
        'Jangan pernah memberikan kredensial (password/OTP) kepada siapapun.',
        'Selalu periksa URL dan pengirim pesan sebelum mengklik tautan apapun.'
    ];
@endphp

<div class="bg-[#090F31] min-h-screen w-full">
    <div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 py-8 pb-20">
        
        <!-- Banner Section -->
        <div class="relative w-full rounded-[20px] overflow-hidden mb-12 shadow-xl bg-black">
            <div class="absolute top-0 left-0 w-full h-[350px] z-0">
                <!-- Bisa diganti dengan gambar dinamis nanti -->
                <img src="{{ asset('images/bg simulasi.png') }}" alt="{{ $simulasi->judul }}" class="w-full h-full object-cover">
                <!-- Overlay to darken background slightly for text readability -->
                <div class="absolute inset-0 bg-gradient-to-t from-[#090F31]/80 to-[#090F31]/30"></div>
            </div>
            <div class="relative z-10 text-center py-20 px-6 h-[350px] flex flex-col justify-center items-center">
                <h1 class="text-3xl md:text-5xl lg:text-5xl leading-tight mb-4 text-white font-bold tracking-wide" style="font-family: 'Audiowide', sans-serif;">
                    {{ $simulasi->judul }}
                </h1>
                <p class="text-gray-200 text-sm md:text-base max-w-3xl mx-auto leading-relaxed">
                    {{ $simulasi->deskripsi }}
                </p>
            </div>
        </div>

        <!-- Tips Section -->
        <div class="max-w-[1000px] mx-auto bg-white rounded-[20px] p-8 md:p-12 shadow-2xl mb-12">
            <div class="flex items-center gap-4 mb-6">
                <!-- Yellow Lightbulb Icon -->
                <div class="bg-[#FFCC00] p-2 rounded-lg text-[#090F31]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h2 class="text-2xl md:text-3xl text-[#090F31] font-bold" style="font-family: 'Audiowide', sans-serif;">
                    Tips Simulasi
                </h2>
            </div>

            <ul class="space-y-3">
                @foreach($tips as $tip)
                    <li class="flex items-start gap-3 text-[#090F31] text-base md:text-lg">
                        <span class="text-[#090F31] mt-1.5 text-[10px]">●</span>
                        <span class="font-medium">{{ $tip }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Buttons -->
        <div class="flex justify-center gap-6">
            <a href="{{ route('user.simulasi') }}" class="px-10 py-3 bg-[#FFCC00] text-[#090F31] font-bold rounded-full hover:bg-yellow-500 transition-colors shadow-lg text-lg">
                Kembali
            </a>
            <a href="{{ route('user.simulasi.play', ['materi' => $materi->id]) }}" class="px-10 py-3 bg-white text-[#090F31] font-bold rounded-full hover:bg-gray-200 transition-colors shadow-lg text-lg">
                Mulai Simulasi
            </a>
        </div>
    </div>
</div>

@endsection
