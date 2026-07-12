<footer class="bg-[#090F31] text-[#FFFFFF] pt-12 pb-6 px-8" style="font-family: 'Inter', sans-serif;">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start gap-12">
        
        <!-- Kolom 1: Logo & Deskripsi -->
        <div class="w-full md:w-1/2">
            <!-- Logo (Gambar Kedua) -->
            <div class="mb-4">
                <!-- Ganti src dengan path logo utuh Anda (misalnya asset('images/logo-shield.png')) -->
                <img src="{{ asset('images/LOGO 1.png') }}?v={{ time() }}" alt="CYBERA Logo Shield" class="h-16 object-contain">
            </div>
            
            <!-- Judul -->
            <h3 class="text-[#FFCC00] font-bold text-lg mb-3">CYBERA (Cyber Education & Awareness)</h3>
            
            <!-- Teks Paragraf -->
            <p class="text-sm leading-relaxed text-gray-200 pr-0 md:pr-12 text-justify">
                platform edukasi keamanan siber berbasis web yang membantu meningkatkan kesadaran dan pengetahuan pengguna mengenai keamanan digital.
            </p>
        </div>

        <!-- Kolom 2: Navigasi -->
        <div class="w-full md:w-1/4">
            <h3 class="text-[#FFCC00] font-bold text-lg mb-4">Navigasi</h3>
            <ul class="flex flex-col space-y-3 text-sm text-gray-200">
                <li><a href="{{ route('user.dashboard') }}" class="hover:text-[#FFCC00] transition-colors duration-200">Dashboard</a></li>
                <li><a href="{{ route('user.materi') }}" class="hover:text-[#FFCC00] transition-colors duration-200">Materi</a></li>
                <li><a href="{{ route('user.simulasi') }}" class="hover:text-[#FFCC00] transition-colors duration-200">Simulasi</a></li>
                <li><a href="{{ route('user.quiz') }}" class="hover:text-[#FFCC00] transition-colors duration-200">Kuis</a></li>
            </ul>
        </div>

        <!-- Kolom 3: Pengelola Sistem -->
        <div class="w-full md:w-1/4">
            <h3 class="text-[#FFCC00] font-bold text-lg mb-4">Pengelola Sistem</h3>
            <ul class="flex flex-col space-y-2 text-sm text-gray-200">
                <li>Bidang Persandian dan Statistik</li>
                <li>Diskominfotik</li>
                <li>Provinsi Lampung</li>
                <li class="pt-4">Version 1.0</li>
            </ul>
        </div>

    </div>

    <!-- Bottom Copyright Box -->
    <div class="max-w-7xl mx-auto mt-12">
        <div class="bg-[#FFFFFF] text-[#090F31] font-bold text-center text-sm py-3 rounded-xl shadow-sm">
            @ 2026 CYBERA - Seluruh hak cipta dilindungi.
        </div>
    </div>
</footer>
