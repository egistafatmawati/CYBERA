@extends('layouts.user')

@section('content')

@php
    $simulasiData = [
        [
            'id' => 1,
            'title' => 'Simulasi Phishing Email',
            'desc' => 'Latih kemampuan Anda mengidentifikasi email phishing. Anda akan diberikan contoh email realistis dan harus menemukan mana yang phishing dan mana yang aman. Pelajari pola-pola serangan phishing yang umum digunakan peretas untuk mencuri data pribadi.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />'
        ],
        [
            'id' => 2,
            'title' => 'Simulasi Website Palsu',
            'desc' => 'Belajar membedakan website asli dan palsu. Anda akan diperlihatkan contoh website berbeda dan harus mengidentifikasi apakah website tersebut resmi atau tiruan. Kenali ciri-ciri website palsu seperti URL mencurigakan, kurangnya HTTPS, dan desain yang tidak konsisten.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-3.6-9 9 9 0 013.6-9m0 18a9 9 0 003.6-9 9 9 0 00-3.6-9" />'
        ],
        [
            'id' => 3,
            'title' => 'Simulasi Password Security',
            'desc' => 'Kuasai seni membuat dan mengelola password yang aman. Simulasi ini mencakup analisis kekuatan password, kuis tentang best practices keamanan password, dan skenario dunia nyata tentang pengelolaan kredensial yang aman.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />'
        ],
        [
            'id' => 4,
            'title' => 'Simulasi Social Engineering',
            'desc' => 'Social engineering adalah seni manipulasi psikologis untuk mendapatkan informasi rahasia. Dalam simulasi ini, Anda akan menghadapi skenario realistis — dari telepon penipuan, pesan WhatsApp mencurigakan, hingga perangkap media sosial — dan belajar mengenali taktik manipulasi.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />'
        ],
        [
            'id' => 5,
            'title' => 'Simulasi Ransomware',
            'desc' => 'Ransomware adalah salah satu ancaman siber paling merusak. Dalam simulasi ini, Anda akan menghadapi skenario terkait ransomware — dari cara masuknya, tanda-tanda infeksi, hingga langkah penanganan yang benar — dan belajar bagaimana merespons dengan tepat.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />'
        ],
        [
            'id' => 6,
            'title' => 'Simulasi Malware Detection',
            'desc' => 'Dari virus hingga rootkit, malware hadir dalam berbagai bentuk. Simulasi ini menyajikan skenario realistis di mana Anda harus mengidentifikasi jenis malware berdasarkan gejala, memilih tindakan yang tepat, dan memahami cara pencegahannya.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />'
        ],
        [
            'id' => 7,
            'title' => 'Simulasi Clear Screen & Digital Hygiene',
            'desc' => 'Keamanan tidak hanya tentang teknologi — kebiasaan sederhana seperti mengunci layar dan membersihkan jejak digital sama pentingnya. Hadapi skenario tentang keamanan fisik, clear desk policy, dan digital hygiene untuk membangun kebiasaan aman.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />'
        ]
    ];
@endphp

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
                Uji Kemampuan Anda dengan <br />
                <span style="color: #FFCC00; display: block; margin-top: 10px;">Simulasi Nyata</span>
            </h1>
            <p class="text-base md:text-lg text-gray-300 max-w-2xl mx-auto leading-relaxed">
                Hadapi skenario keamanan siber yang realistis. Dari mengenali email phishing hingga mendeteksi manipulasi sosial — latih insting Anda melindungi diri dari ancaman digital.
            </p>
        </div>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2" style="gap: 2rem;">
        @foreach($simulasiData as $item)
        <div class="bg-white p-6 shadow-lg flex gap-4 transition-transform hover:scale-[1.02]" style="border-radius: 20px;">
            <!-- Icon -->
            <div class="shrink-0 flex items-center justify-center rounded-md" style="width: 48px; height: 48px; background-color: #FFCC00;">
                <svg class="w-6 h-6" style="color: #090F31;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    {!! $item['icon'] !!}
                </svg>
            </div>
            
            <!-- Content -->
            <div class="flex flex-col flex-grow">
                <h3 class="font-bold text-lg mb-2" style="color: #090F31;">{{ $item['title'] }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-4 text-justify">
                    {{ $item['desc'] }}
                </p>
                
                <!-- Play Button Bottom Left -->
                <div class="mt-auto flex justify-start">
                    <a href="{{ route('user.simulasi.show', ['materi' => $item['id']]) }}" class="flex items-center justify-center transition-opacity hover:opacity-80">
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
