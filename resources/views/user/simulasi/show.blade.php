@extends('layouts.user')

@section('content')
<style>
    footer { display: none !important; }
</style>

@php
    // Ambil tips dari database jika ada, jika belum diisi maka gunakan array kosong atau fallback default
    $tips = $simulasi->tips ?? [];
    
    // Fallback sementara jika kebetulan tips di database masih kosong agar tampilan tidak rusak saat dicek
    if (empty($tips)) {
        $tips = [
            'Periksa alamat pengirim — domain harus resmi dan tidak mencurigakan.',
            'Waspadai nada mendesak atau mengancam seperti "AKUN ANDA AKAN DIBLOKIR!".',
            'Jangan klik tautan mencurigakan — arahkan kursor untuk melihat URL sebenarnya.',
            'Email resmi biasanya menyapa dengan nama Anda, bukan "Pengguna" atau "Nasabah".'
        ];
    }

    // Pemetaan custom judul untuk kotak tips berdasarkan judul simulasi
    $judulSimulasiLower = strtolower(trim($simulasi->judul));
    
    $tipsTitle = match($judulSimulasiLower) {
        'simulasi phishing email' => 'Tips Mengenali Phishing',
        'simulasi website palsu' => 'Ciri-Ciri Website Palsu',
        'simulasi password security' => 'Apa yang Akan Anda Pelajari:',
        'simulasi social engineering' => 'Taktik Social Engineering yang Akan Anda Hadapi:',
        'simulasi ransomware' => 'Yang Akan Anda Pelajari:',
        'simulasi malware detection' => 'Yang Akan Anda Pelajari:',
        'simulasi clear screen & digital hygiene' => 'Yang Akan Anda Pelajari:',
        default => 'Tips ' . str_replace('Simulasi ', '', $simulasi->judul)
    };
@endphp

<!-- Hero Section -->
<section class="pt-2 pb-16 px-8 bg-[#090F31]">
    <!-- Banner Section -->
    <div class="relative w-full rounded-[2rem] overflow-hidden shadow-2xl h-[420px] flex items-center justify-center">
        <div class="absolute top-0 left-0 w-full h-[420px] z-0">
            <!-- Bisa diganti dengan gambar dinamis nanti -->
            <img src="{{ asset('images/bg simulasi.png') }}" alt="{{ $simulasi->judul }}" class="w-full h-full object-cover">
            <!-- Overlay to darken background slightly for text readability -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#090F31]/80 to-[#090F31]/30"></div>
        </div>
        <div class="relative z-10 text-center px-6 flex flex-col justify-center items-center">
            <h1 class="text-3xl md:text-5xl lg:text-5xl leading-tight mb-4 text-white font-bold tracking-wide" style="font-family: 'Audiowide', sans-serif;">
                {{ $simulasi->judul }}
            </h1>
            <p class="text-gray-200 text-sm md:text-base max-w-3xl mx-auto leading-relaxed">
                {{ $simulasi->deskripsi }}
            </p>
        </div>
    </div>
</section>

<!-- Section Konten Utama (Background Putih Penuh Edge-to-Edge) -->
<section class="bg-white w-full py-16 flex-grow">
    <div class="max-w-5xl mx-auto px-6">
        
        <!-- Tips Section -->
        <div class="w-full mx-auto bg-[#090F31] rounded-[20px] p-8 md:p-12 shadow-2xl mb-16">
            <div class="flex items-center gap-4 mb-8">
                <!-- Yellow Lightbulb Icon -->
                <div class="bg-[#FFCC00] p-2 rounded-lg text-[#090F31]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-white" style="font-family: 'Audiowide', sans-serif;">
                    {{ $tipsTitle }}
                </h2>
            </div>
            <ul class="space-y-2">
                @foreach($tips as $tip)
                    <li class="flex items-start gap-3 text-[#FFCC00]">
                        <span class="mt-2 text-[8px]">●</span>
                        <span class="text-lg">{{ $tip }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Buttons -->
        <div class="flex justify-center gap-6">
            <a href="{{ route('user.simulasi') }}"
                class="inline-block bg-[#FFCC00] text-[#090F31] font-bold py-3 px-10 rounded-full hover:bg-yellow-500 transition-colors shadow-sm text-base text-center min-w-[180px]">
                Kembali
            </a>
            <a href="{{ route('user.simulasi.play', ['materi' => $materi->id]) }}"
                class="inline-block bg-[#090F31] text-[#FFCC00] font-bold py-3 px-10 rounded-full hover:bg-blue-900 transition-colors shadow-sm text-base text-center min-w-[180px]">
                Mulai Simulasi
            </a>
        </div>
    </div>
</section>

@endsection
