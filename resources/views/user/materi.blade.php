@extends('layouts.user')

@section('content')

@php
    $materiData = [
        [
            'id' => 1,
            'title' => 'Dasar Keamanan Siber',
            'desc' => 'Pahami konsep fundamental keamanan siber dan mengapa ini penting bagi semua orang.',
            'image' => 'images/card 2.png',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>'
        ],
        [
            'id' => 2,
            'title' => 'Phishing',
            'desc' => 'Kenali berbagai jenis serangan phishing dan cara melindungi diri dari penipuan online.',
            'image' => 'images/card 3.png',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>'
        ],
        [
            'id' => 3,
            'title' => 'Malware',
            'desc' => 'Pelajari tentang virus, worm, trojan, dan berbagai jenis perangkat lunak berbahaya.',
            'image' => 'images/card 4.png',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>'
        ],
        [
            'id' => 4,
            'title' => 'Ransomware',
            'desc' => 'Pahami ancaman ransomware, cara penyebarannya, dan strategi pencegahannya.',
            'image' => 'images/card 5.png',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>'
        ],
        [
            'id' => 5,
            'title' => 'Social Engineering',
            'desc' => 'Pelajari taktik manipulasi psikologis yang digunakan peretas untuk mendapatkan informasi.',
            'image' => 'images/card 6.png',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
        ],
        [
            'id' => 6,
            'title' => 'Password Security',
            'desc' => 'Kuasai praktik terbaik dalam membuat dan mengelola password yang aman.',
            'image' => 'images/card 7.png',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>'
        ],
        [
            'id' => 7,
            'title' => 'Clear Screen & Digital Hygiene',
            'desc' => 'Praktik keamanan fisik dan digital mulai dari clear desk policy hingga kebersihan jejak digital.',
            'image' => 'images/card 8.png',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>'
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
        @foreach($materiData as $item)
        <div class="bg-white overflow-hidden shadow-xl transform hover:-translate-y-2 transition-transform duration-300 flex flex-col" style="border-radius: 20px;">
            <div class="relative h-56 bg-gray-200">
                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover">
                <!-- Icon Overlapping (Bottom Left) -->
                <div class="absolute w-10 h-10 rounded-md flex items-center justify-center shadow-lg" style="bottom: 1.5rem; left: 1.5rem; background-color: #FFCC00; color: #090F31;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $item['icon'] !!}
                    </svg>
                </div>
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <h3 class="font-bold text-[17px] mb-3" style="color: #090F31; font-family: 'Audiowide', sans-serif;">{{ $item['title'] }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-6 flex-grow">{{ $item['desc'] }}</p>
                <a href="{{ route('user.materi.detail', $item['id']) }}" style="color: #FFCC00;" class="font-bold text-sm flex items-center hover:text-yellow-500 transition-colors">
                    Mulai Belajar <span class="ml-2 text-lg">→</span>
                </a>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection
