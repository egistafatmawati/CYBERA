@extends('layouts.user')

@section('content')

@php
    $icons = [
        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />',
        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-3.6-9 9 9 0 013.6-9m0 18a9 9 0 003.6-9 9 9 0 00-3.6-9" />',
        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />',
        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />',
        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />',
        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />',
        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />'
    ];
@endphp

<section class="pt-2 pb-16 px-8">
    <div class="relative w-full rounded-[2rem] overflow-hidden shadow-2xl h-[420px] flex items-center justify-center">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/card1.png') }}" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#020510]/100 via-[#020510]/60 to-transparent"></div>
        </div>
        
        <!-- Text Content -->
        <div class="relative max-w-4xl mx-auto text-center z-10 px-6">
            <h1 class="text-3xl md:text-4xl lg:text-[42px] leading-tight mb-6 text-white tracking-wide" style="font-family: 'Audiowide', sans-serif;">
                Uji Kemampuan Anda dengan <br />
                <span style="display: block; margin-top: 10px;">Simulasi Nyata</span>
            </h1>
            <p class="text-sm md:text-base text-gray-300 max-w-2xl mx-auto text-center leading-relaxed">
                Hadapi skenario keamanan siber yang realistis. Dari mengenali email phishing hingga mendeteksi manipulasi sosial — latih insting Anda melindungi diri dari ancaman digital.
            </p>
        </div>
    </div>
</section>

<!-- Container Konten Utama -->
<div class="w-[90%] lg:w-[85%] mx-auto pb-20 relative">

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 w-full mx-auto">
        @foreach($simulasis as $index => $item)
        @php
            $iconIndex = $index % count($icons);
        @endphp
        <div class="bg-white p-6 min-h-[245px] shadow-lg flex gap-4 transition-transform hover:scale-[1.02]" style="border-radius: 20px;">
            <!-- Icon -->
            <div class="shrink-0 flex items-center justify-center rounded-md" style="width: 48px; height: 48px; background-color: #FFCC00;">
                <svg class="w-6 h-6" style="color: #090F31;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    {!! $icons[$iconIndex] !!}
                </svg>
            </div>
            
            <!-- Content -->
            <div class="flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-[#090F31] mb-4 group-hover:text-[#FFCC00] transition-colors">
                            {{ $item->judul }}
                        </h3>
                        <p class="text-sm md:text-base text-gray-600 leading-relaxed mb-6 pr-4 lg:pr-12">
                            {{ Str::limit($item->deskripsi, 250) }}
                        </p>
                
                <!-- Play Button Bottom Left -->
                <div class="mt-4 flex justify-start">
                    <a href="{{ route('user.simulasi.show', ['materi' => $item->materi_id]) }}" class="flex items-center justify-center transition-opacity hover:opacity-80">
                        <svg class="w-8 h-8" style="color: #FFCC00;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="10 8 16 12 10 16 10 8" fill="#FFCC00"></polygon>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection
