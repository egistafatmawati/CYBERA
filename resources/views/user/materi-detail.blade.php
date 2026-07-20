@extends('layouts.user')

@section('content')
<style>
    /* Sembunyikan footer khusus di halaman materi detail */
    footer { display: none !important; }

    /* Styling Teks Materi */
    .konten-materi {
        color: #090F31;
        font-family: 'Inter', sans-serif;
    }
    .konten-materi section { margin-bottom: 3rem; }
    .konten-materi h2 {
        font-size: 1.75rem; 
        line-height: 2.25rem; 
        font-weight: 700;
        margin-top: 2.5rem;
        margin-bottom: 1rem; 
        color: #090F31;
        font-family: 'Audiowide', sans-serif;
    }
    .konten-materi p { 
        margin-bottom: 1rem; 
        text-align: left; /* Teks rata kiri */
        line-height: 1.7; 
        font-size: 1rem;
    }
    .konten-materi ul {
        list-style-type: disc !important; 
        list-style-position: outside !important;
        padding-left: 1.5rem; 
        margin-bottom: 1.5rem; 
        text-align: left; /* Teks rata kiri */
        line-height: 1.7;
    }
    .konten-materi ol {
        list-style-type: decimal !important; 
        list-style-position: outside !important;
        padding-left: 1.5rem; 
        margin-bottom: 1.5rem; 
        text-align: left; /* Teks rata kiri */
        line-height: 1.7;
    }
    .konten-materi li { margin-bottom: 0.5rem; }
    .konten-materi div { display: flex; flex-direction: column; gap: 1rem; }
</style>

<!-- Hero Section -->
<section class="pt-2 px-8 bg-[#090F31]">
    <div class="relative w-full rounded-[2rem] overflow-hidden shadow-2xl h-[420px] flex items-center justify-center">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/materi 1.png') }}" alt="{{ $materi->judul }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#090F31]/95 to-[#090F31]/60"></div>
        </div>
        
        <!-- Text Content -->
        <div class="relative max-w-4xl mx-auto text-center z-10 px-6">
            <h1 class="text-3xl md:text-5xl lg:text-5xl leading-tight mb-6 text-white" style="font-family: 'Audiowide', sans-serif;">
                {{ $materi->judul }}
            </h1>
            <a href="{{ route('user.materi') }}" class="bg-[#FFCC00] text-[#090F31] font-bold py-2 px-6 rounded-full text-sm shadow-md hover:bg-yellow-500 transition-colors inline-block">Materi</a>
        </div>
    </div>
</section>

<!-- Section Konten Utama (Background Putih Penuh Edge-to-Edge) -->
<section class="bg-white w-full py-16 flex-grow">
    <!-- Menggunakan px-8 agar garis kiri teks sejajar sempurna dengan garis kiri gambar Hero -->
    <div class="w-full px-16 text-[#090F31]">
        
        <!-- Deskripsi Utama di atas -->
        <p class="text-base text-[#090F31] leading-relaxed mb-10 text-left">
            {{ $materi->deskripsi }}
        </p>

        <!-- Konten HTML dari Database -->
        <div class="konten-materi">
            {!! $materi->isi !!}
        </div>

        <!-- Navigation Buttons (Model minimalis pill button) -->
        <div class="flex flex-row justify-between items-center mt-20">
            @if($prev)
                <a href="{{ route('user.materi.detail', $prev->id) }}" class="inline-block bg-[#FFCC00] text-[#090F31] font-bold py-2.5 px-8 rounded-full hover:bg-yellow-500 transition-colors shadow-sm text-sm md:text-base text-center min-w-[140px]">
                    {{ $prev->judul }}
                </a>
            @else
                <a href="{{ route('user.materi') }}" class="inline-block bg-[#FFCC00] text-[#090F31] font-bold py-2.5 px-8 rounded-full hover:bg-yellow-500 transition-colors shadow-sm text-sm md:text-base text-center min-w-[140px]">
                    Materi
                </a>
            @endif

            @if($next)
                <a href="{{ route('user.materi.detail', $next->id) }}" class="inline-block bg-[#090F31] text-white font-bold py-2.5 px-8 rounded-full hover:bg-blue-900 transition-colors shadow-sm text-sm md:text-base text-center min-w-[140px]">
                    {{ $next->judul }}
                </a>
            @else
                <a href="{{ route('user.materi') }}" class="inline-block bg-[#090F31] text-white font-bold py-2.5 px-8 rounded-full hover:bg-blue-900 transition-colors shadow-sm text-sm md:text-base text-center min-w-[140px]">
                    Selesai
                </a>
            @endif
        </div>
        
    </div>
</section>
@endsection
