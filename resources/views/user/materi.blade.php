@extends('layouts.user')

@section('content')

<div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 py-8 pb-20">
    
    <!-- Banner Section -->
    <div class="relative w-full overflow-hidden mb-16" style="border-radius: 20px;">
        <!-- Background Image -->
        <div class="absolute top-0 left-0 w-full h-[650px] z-0">
            <img src="{{ asset('images/card1.png') }}" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#090F31]/80 to-[#090F31]/30"></div>
        </div>
        
        <!-- Text Content -->
        <div class="relative z-10 text-center py-20 md:py-28 px-6">
            <h1 class="text-3xl md:text-5xl lg:text-5xl leading-tight mb-6 text-white" style="font-family: 'Audiowide', sans-serif;">
                Pelajari <br />
                <span style="color: #FFCC00; display: block; margin-top: 10px;">Keamanan Siber</span> 
            </h1>
            <p class="text-base md:text-lg text-gray-300 max-w-2xl mx-auto leading-relaxed">
                Tujuh topik fundamental yang dirancang untuk membangun pemahaman menyeluruh tentang keamanan siber, mulai dari dasar hingga teknik perlindungan tingkat lanjut.
            </p>
        </div>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
        @forelse($materis as $item)
        <div class="bg-white overflow-hidden shadow-xl transform hover:-translate-y-2 transition-transform duration-300 flex flex-col" style="border-radius: 20px;">
            <div class="relative h-56 bg-gray-200">
                <img src="{{ asset('images/card 2.png') }}" alt="{{ $item->judul }}" class="w-full h-full object-cover">
                <!-- Icon Overlapping (Bottom Left) -->
                <div class="absolute w-10 h-10 rounded-md flex items-center justify-center shadow-lg" style="bottom: 1.5rem; left: 1.5rem; background-color: #FFCC00; color: #090F31;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
            </div>
            <div class="p-6 flex flex-col flex-grow">
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
