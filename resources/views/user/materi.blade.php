@extends('layouts.user')

@section('content')
<!-- Hero Section -->
<section class="pt-2 pb-16 px-8">
    <div class="relative w-full rounded-[2rem] overflow-hidden shadow-2xl h-[420px] flex items-center justify-center">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/card1.png') }}" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#020510]/100 via-[#020510]/60 to-transparent"></div>
        </div>
        
        <!-- Text Content -->
        <div class="relative z-10 text-center py-20 md:py-28 px-6">
            <h1 class="text-3xl md:text-5xl lg:text-[50px] leading-tight mb-6 text-white" style="font-family: 'Audiowide', sans-serif;">
                Pelajari Keamanan Siber 
            </h1>
            <p class="text-sm md:text-base text-gray-300 max-w-2xl mx-auto text-center leading-relaxed">
                Tujuh topik fundamental yang dirancang untuk membangun pemahaman menyeluruh tentang keamanan siber, mulai dari dasar hingga teknik perlindungan tingkat lanjut.
            </p>
        </div>
    </div>
</section>

<!-- Container Konten Utama -->
<div class="w-[90%] lg:w-[85%] mx-auto pb-20 relative">
    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
        @forelse($materis as $item)
        @php
            $icons = [
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>',
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>',
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>',
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>',
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>',
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>'
            ];
            $iconIndex = ($loop->index) % count($icons);
            $icon = $icons[$iconIndex];
            
            $imageIndex = ($loop->index % 7) + 2; // images/card 2.png to card 8.png
            $image = 'images/card ' . $imageIndex . '.png';
        @endphp
        <div class="bg-transparent overflow-hidden shadow-xl transform hover:-translate-y-2 transition-transform duration-300 flex flex-col" style="border-radius: 20px;">
            <div class="relative h-56 bg-transparent overflow-hidden">
                <img src="{{ asset($image) }}" alt="{{ $item->judul }}" class="absolute top-0 left-0 w-full object-cover" style="height: calc(100% + 24px); object-position: top;">
                <!-- Icon Overlapping (Bottom Left) -->
                <div class="absolute w-10 h-10 rounded-md flex items-center justify-center shadow-lg z-20" style="bottom: 1.5rem; left: 1.5rem; background-color: #FFCC00; color: #090F31;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $icon !!}
                    </svg>
                </div>
            </div>
            <div class="p-6 flex flex-col flex-grow bg-white relative z-10">
                <h3 class="font-bold text-[17px] mb-3" style="color: #090F31; font-family: 'Audiowide', sans-serif;">{{ $item->judul }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-6 flex-grow">{{ $item->deskripsi }}</p>
                <a href="{{ route('user.materi.detail', $item->id) }}" style="color: #FFCC00;" class="font-bold text-sm flex items-center hover:text-yellow-500 transition-colors">
                    Mulai Belajar <span class="ml-2 text-lg">→</span>
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-16 text-gray-400">
            <p class="text-lg">Belum ada materi tersedia.</p>
        </div>
        @endforelse
    </div>

</div>

@endsection
