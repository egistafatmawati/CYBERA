@extends('layouts.user')

@section('content')
<style>
    .konten-materi section { margin-bottom: 3rem; }
    .konten-materi h2 {
        font-size: 1.5rem; line-height: 2rem; font-weight: 700;
        margin-bottom: 1.25rem; color: #090F31;
        font-family: 'Audiowide', sans-serif;
    }
    .konten-materi p { margin-bottom: 1rem; text-align: justify; line-height: 1.7; }
    .konten-materi ul {
        list-style-type: disc !important; list-style-position: outside !important;
        padding-left: 1.5rem; margin-bottom: 1rem; text-align: justify; line-height: 1.7;
    }
    .konten-materi ol {
        list-style-type: decimal !important; list-style-position: outside !important;
        padding-left: 1.5rem; margin-bottom: 1rem; text-align: justify; line-height: 1.7;
    }
    .konten-materi li { margin-bottom: 0.75rem; }
    .konten-materi div { display: flex; flex-direction: column; gap: 1rem; }
</style>

<div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 py-8 pb-20">
    
    <!-- Banner Section -->
    <div class="relative w-full rounded-[20px] overflow-hidden mb-12 shadow-xl bg-black">
        <div class="absolute top-0 left-0 w-full h-[350px] z-0">
            <img src="{{ asset('images/materi 1.png') }}" alt="{{ $materi->judul }}" class="w-full h-full object-cover">
            <!-- Overlay to darken background slightly for text readability -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#090F31]/80 to-[#090F31]/30"></div>
        </div>
        <div class="relative z-10 text-center py-20 px-6 h-[350px] flex flex-col justify-center items-center">
            <h1 class="text-3xl md:text-5xl lg:text-5xl leading-tight mb-6 text-white font-bold tracking-wide" style="font-family: 'Audiowide', sans-serif;">
                {{ $materi->judul }}
            </h1>
            <a href="{{ route('user.materi') }}" class="bg-[#FFCC00] text-[#090F31] font-bold py-2 px-6 rounded-full text-sm shadow-md hover:bg-yellow-500 transition-colors inline-block">Materi</a>
        </div>
    </div>

    <!-- Content Section -->
    <div class="w-full bg-white rounded-[20px] p-8 md:p-12 shadow-xl text-[#090F31] leading-relaxed">
        <p class="text-lg md:text-xl text-center text-[#090F31] font-semibold max-w-4xl mx-auto" style="margin-bottom: 4rem;">
            {{ $materi->deskripsi }}
        </p>

        <div class="konten-materi">
            <!-- Render Isi HTML dari database -->
            {!! $materi->isi !!}
        </div>

        <!-- Navigation Buttons -->
        <div class="flex flex-row justify-between items-center" style="margin-top: 6rem; padding-top: 2rem;">
            @if($prev)
                <a href="{{ route('user.materi.detail', $prev->id) }}" class="text-center bg-[#FFCC00] text-[#090F31] font-bold py-3 md:py-4 px-8 md:px-12 rounded-full hover:bg-yellow-500 transition-colors shadow-md text-base md:text-lg">
                    {{ $prev->judul }}
                </a>
            @else
                <a href="{{ route('user.materi') }}" class="text-center bg-[#FFCC00] text-[#090F31] font-bold py-3 md:py-4 px-8 md:px-12 rounded-full hover:bg-yellow-500 transition-colors shadow-md text-base md:text-lg">
                    Materi
                </a>
            @endif

            @if($next)
                <a href="{{ route('user.materi.detail', $next->id) }}" class="text-center bg-[#090F31] text-white font-bold py-3 md:py-4 px-8 md:px-12 rounded-full hover:bg-blue-900 transition-colors shadow-md text-base md:text-lg">
                    {{ $next->judul }}
                </a>
            @else
                <a href="{{ route('user.materi') }}" class="text-center bg-[#090F31] text-white font-bold py-3 md:py-4 px-8 md:px-12 rounded-full hover:bg-blue-900 transition-colors shadow-md text-base md:text-lg">
                    Selesai
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
