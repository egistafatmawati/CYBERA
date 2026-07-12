@extends('layouts.user')

@section('content')

@php
    $id = $materi->id ?? 1;

    // Hardcode data 7 simulasi
    $semuaTips = [
        1 => [
            'judul' => 'Simulasi Phishing Email',
            'desc' => 'Latih kemampuan Anda mengidentifikasi email phishing. Anda akan diberikan contoh email realistis dan harus menentukan mana yang phishing dan mana yang aman. Pelajari pola-pola serangan phishing yang umum digunakan peretas untuk mencuri data pribadi.',
            'tips_title' => 'Tips Mengenali Phishing',
            'tips' => [
                'Periksa alamat pengirim — domain harus resmi dan tidak mencurigakan',
                'Waspadai nada mendesak atau mengancam seperti "AKUN ANDA AKAN DIBLOKIR!"',
                'Jangan klik tautan mencurigakan — arahkan kursor untuk melihat URL sebenarnya',
                'Email resmi biasanya menyapa dengan nama Anda, bukan "Pengguna" atau "Nasabah"'
            ]
        ],
        2 => [
            'judul' => 'Simulasi Website Palsu',
            'desc' => 'Belajar membedakan website asli dan palsu. Anda akan diperlihatkan contoh website berbeda dan harus mengidentifikasi apakah website tersebut resmi atau tiruan. Kenali ciri-ciri website palsu seperti URL mencurigakan, kurangnya HTTPS, dan desain yang tidak konsisten.',
            'tips_title' => 'Ciri-Ciri Website Palsu',
            'tips' => [
                'URL mencurigakan — domain aneh, typo, atau TLD tidak umum (.xyz, .site, .online)',
                'Tidak ada ikon gembok (SSL/HTTPS) di address bar',
                'Desain tidak konsisten, banyak typo, atau gambar berkualitas rendah',
                'Tidak ada informasi kontak yang jelas atau halaman kebijakan privasi'
            ]
        ],
        3 => [
            'judul' => 'Simulasi Password Security',
            'desc' => 'Kuasai seni membuat dan mengelola password yang aman. Simulasi ini mencakup analisis kekuatan password, kuis tentang best practices keamanan password, dan skenario dunia nyata tentang pengelolaan kredensial yang aman.',
            'tips_title' => 'Apa yang Akan Anda Pelajari:',
            'tips' => [
                'Cara membuat password yang kuat dan mudah diingat',
                'Mengapa passphrase lebih aman daripada password kompleks',
                'Bahaya menggunakan password yang sama di banyak akun',
                'Pentingnya Two-Factor Authentication (2FA)'
            ]
        ],
        4 => [
            'judul' => 'Simulasi Social Engineering',
            'desc' => 'Social engineering adalah seni manipulasi psikologis untuk mendapatkan informasi rahasia. Dalam simulasi ini, Anda akan menghadapi skenario realistis — dari telepon penipuan, pesan WhatsApp mencurigakan, hingga perangkap media sosial — dan belajar mengenali taktik manipulasi.',
            'tips_title' => 'Taktik Social Engineering yang Akan Anda Hadapi:',
            'tips' => [
                'Vishing — Penipuan melalui panggilan telepon dengan menyamar sebagai pihak berwenang',
                'CEO Fraud — Penipu menyamar sebagai petinggi perusahaan untuk meminta transfer dana',
                'Pretexting — Membangun cerita palsu untuk mendapatkan kepercayaan korban',
                'Baiting — Menggunakan umpan (seperti USB drive) untuk menjebak korban'
            ]
        ],
        5 => [
            'judul' => 'Simulasi Ransomware',
            'desc' => 'Ransomware adalah salah satu ancaman siber paling merusak. Dalam simulasi ini, Anda akan menghadapi skenario terkait ransomware — dari cara masuknya, tanda-tanda infeksi, hingga langkah penanganan yang benar — dan belajar bagaimana merespons dengan tepat.',
            'tips_title' => 'Yang Akan Anda Pelajari:',
            'tips' => [
                'Mengenali vektor masuk ransomware (email, RDP, software bajakan)',
                'Tanda-tanda awal infeksi ransomware',
                'Langkah penanganan yang benar saat terinfeksi',
                'Strategi pencegahan dan backup yang efektif'
            ]
        ],
        6 => [
            'judul' => 'Simulasi Malware Detection',
            'desc' => 'Dari virus hingga rootkit, malware hadir dalam berbagai bentuk. Simulasi ini menyajikan skenario realistis di mana Anda harus mengidentifikasi jenis malware berdasarkan gejala, memilih tindakan yang tepat, dan memahami cara pencegahannya.',
            'tips_title' => 'Yang Akan Anda Pelajari:',
            'tips' => [
                'Mengenali gejala awal infeksi malware pada perangkat',
                'Membedakan berbagai jenis malware (Virus, Trojan, Worm, Spyware)',
                'Tindakan darurat saat perangkat dicurigai terinfeksi',
                'Praktik terbaik untuk mencegah masuknya malware'
            ]
        ],
        7 => [
            'judul' => 'Simulasi Clear Screen & Digital Hygiene',
            'desc' => 'Keamanan tidak hanya tentang teknologi — kebiasaan sederhana seperti mengunci layar dan membersihkan jejak digital sama pentingnya. Hadapi skenario tentang keamanan fisik, clear desk policy, dan digital hygiene untuk membangun kebiasaan aman.',
            'tips_title' => 'Fokus Pembelajaran:',
            'tips' => [
                'Pentingnya mengunci layar (Lock Screen) saat meninggalkan meja',
                'Menerapkan Clear Desk Policy untuk dokumen fisik',
                'Membersihkan jejak digital (cache, cookies, history) secara berkala',
                'Mencegah pencurian informasi melalui shoulder surfing'
            ]
        ]
    ];

    $data = $semuaTips[$id] ?? $semuaTips[1];
@endphp

<div class="bg-[#090F31] min-h-screen w-full">
    <div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 py-8 pb-20">
        
        <!-- Banner Section -->
        <div class="relative w-full rounded-[20px] overflow-hidden mb-12 shadow-xl bg-black">
            <div class="absolute top-0 left-0 w-full h-[350px] z-0">
                <!-- Bisa diganti dengan gambar dinamis nanti -->
                <img src="{{ asset('images/bg simulasi.png') }}" alt="{{ $data['judul'] }}" class="w-full h-full object-cover">
                <!-- Overlay to darken background slightly for text readability -->
                <div class="absolute inset-0 bg-gradient-to-t from-[#090F31]/80 to-[#090F31]/30"></div>
            </div>
            <div class="relative z-10 text-center py-20 px-6 h-[350px] flex flex-col justify-center items-center">
                <h1 class="text-3xl md:text-5xl lg:text-5xl leading-tight mb-4 text-white font-bold tracking-wide" style="font-family: 'Audiowide', sans-serif;">
                    {{ $data['judul'] }}
                </h1>
                <p class="text-gray-200 text-sm md:text-base max-w-3xl mx-auto leading-relaxed">
                    {{ $data['desc'] }}
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
                    {{ $data['tips_title'] }}
                </h2>
            </div>

            <ul class="space-y-3">
                @foreach($data['tips'] as $tip)
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
            <a href="{{ route('user.simulasi.play', ['materi' => $id]) }}" class="px-10 py-3 bg-white text-[#090F31] font-bold rounded-full hover:bg-gray-200 transition-colors shadow-lg text-lg">
                Mulai Simulasi
            </a>
        </div>
    </div>
</div>

@endsection
