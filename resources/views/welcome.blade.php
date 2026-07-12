<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-select">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CYBERA - Cyber Education & Awareness</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">

    <!-- Scripts (Tailwind CSS via Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-['Inter'] antialiased bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- Header -->
    @include('partials.header')

    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Hero Section -->
        <section class="relative bg-[#090F31] text-white py-24 md:py-32 px-6 overflow-hidden">
            <!-- Dekorasi Background (opsional/placeholder) -->
            <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/card1.png') }}" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#090F31]/80 to-[#090F31]/30"></div>
        </div>


            <div class="relative max-w-4xl mx-auto text-center z-10">
                <h1 class="text-3xl md:text-5xl lg:text-5xl leading-tight mb-6" style="font-family: 'Audiowide', sans-serif;">
                    Tingkatkan Kesadaran <br />
                    <span class="text-[#FFCC00]">Keamanan Siber</span> Anda Melalui <br />
                    Simulasi Interaktif
                </h1>
                <p class="text-base md:text-lg text-gray-300 max-w-2xl mx-auto leading-relaxed">
                    Selamat datang di CYBERA, platform edukasi keamanan siber yang dikembangkan untuk mendukung peningkatan kesadaran dan pemahaman pengguna terhadap berbagai risiko keamanan informasi di era digital.
                </p>
            </div>
        </section>

        <!-- Steps / Cards Section -->
        <section class="py-20 px-6 bg-white">
            <div class="max-w-7xl mx-auto text-center mb-16">
                <h2 class="text-3xl mb-4 text-[#090F31]" style="font-family: 'Audiowide', sans-serif;">
                    Mulai Perjalanan di <span class="text-[#FFCC00]">CYBERA!</span>
                </h2>
                <p class="text-gray-600">Empat Langkah sederhana untuk meningkatkan kesadaran mengenai keamanan siber.</p>
            </div>

            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1 -->
                <div class="bg-[#090F31] rounded-2xl p-8 text-center flex flex-col items-center shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 bg-[#FFCC00] rounded-xl flex items-center justify-center mb-6 text-[#090F31]">
                        <!-- Icon User Add -->
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg mb-3">Daftar Akun</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">Buat akun dalam hitungan detik dan mulai perjalanan edukasi keamanan siber.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-[#090F31] rounded-2xl p-8 text-center flex flex-col items-center shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 bg-[#FFCC00] rounded-xl flex items-center justify-center mb-6 text-[#090F31]">
                        <!-- Icon Book -->
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg mb-3">Pelajari Materi</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">Akses materi edukasi lengkap tentang berbagai topik keamanan siber.</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-[#090F31] rounded-2xl p-8 text-center flex flex-col items-center shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 bg-[#FFCC00] rounded-xl flex items-center justify-center mb-6 text-[#090F31]">
                        <!-- Icon Monitor -->
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg mb-3">Jalani Simulasi</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">Praktikan pengetahuan Anda melalui simulasi interaktif berbasis skenario nyata.</p>
                </div>

                <!-- Card 4 -->
                <div class="bg-[#090F31] rounded-2xl p-8 text-center flex flex-col items-center shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 bg-[#FFCC00] rounded-xl flex items-center justify-center mb-6 text-[#090F31]">
                        <!-- Icon Clipboard Check -->
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg mb-3">Kuis</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">Ikuti kuis evaluasi dan lihat hasil serta dapatkan feedback.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    @include('partials.footer')

</body>
</html>