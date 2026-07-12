@extends('layouts.user')

@section('content')
<div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 py-8">
    
    <!-- Banner Section -->
    <div class="relative w-full overflow-hidden mb-6" style="border-radius: 20px;">
        <!-- Background Image -->
        <div class="absolute top-0 left-0 w-full h-[650px] z-0">
            <img src="{{ asset('images/card1.png') }}" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#090F31]/80 to-[#090F31]/30"></div>
        </div>
        
        <!-- Text Content -->
        <div class="relative z-10 text-center py-12 md:py-16 lg:py-20 px-6">
            <h1 class="text-3xl md:text-5xl lg:text-5xl leading-tight mb-6" style="font-family: 'Audiowide', sans-serif;">
                Tingkatkan Kesadaran <br />
                <span class="text-[#FFCC00]">Keamanan Siber</span> Anda Melalui <br />
                Simulasi Interaktif</span>
            </h1>
            <p class="text-base md:text-lg text-gray-300 max-w-2xl mx-auto leading-relaxed">
                Selamat datang di CYBERA, platform edukasi keamanan siber yang 
                dikembangkan untuk mendukung peningkatan kesadaran dan 
                pemahaman pengguna terhadap berbagai risiko keamanan informasi 
                di era digital.
            </p>
        </div>
    </div>

    <!-- Feature Cards — Welcome Page Style Flex -->
    <div class="flex flex-col md:flex-row justify-center max-w-full mx-auto w-full" style="margin-bottom: 3rem; gap: 2rem;">
        
        <!-- Materi -->
        <a href="{{ route('user.materi') }}" style="flex: 1 1 0%; border-radius: 20px;" class="bg-white p-6 shadow-xl flex gap-4 transition-transform hover:-translate-y-2 duration-300">
            <div class="shrink-0 flex items-center justify-center rounded-md" style="width: 48px; height: 48px; background-color: #FFCC00; color: #090F31;">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <div class="flex flex-col text-left">
                <h3 class="text-[#090F31] font-bold text-lg mb-2">Materi</h3>
                <p class="text-sm leading-relaxed mb-4" style="color: rgba(9, 15, 49, 0.8);">Pelajari Topik Keamanan Siber</p>
                <!-- Play Button -->
                <div class="mt-auto">
                    <svg class="w-8 h-8" style="color: #FFCC00;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="10 8 16 12 10 16 10 8" fill="#FFCC00"></polygon>
                    </svg>
                </div>
            </div>
        </a>
        
        <!-- Simulasi -->
        <a href="{{ route('user.simulasi') }}" style="flex: 1 1 0%; border-radius: 20px;" class="bg-white p-6 shadow-xl flex gap-4 transition-transform hover:-translate-y-2 duration-300">
            <div class="shrink-0 flex items-center justify-center rounded-md" style="width: 48px; height: 48px; background-color: #FFCC00; color: #090F31;">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div class="flex flex-col text-left">
                <h3 class="text-[#090F31] font-bold text-lg mb-2">Simulasi</h3>
                <p class="text-sm leading-relaxed mb-4" style="color: rgba(9, 15, 49, 0.8);">Uji kemampuan dengan skenario interaktif.</p>
                <!-- Play Button -->
                <div class="mt-auto">
                    <svg class="w-8 h-8" style="color: #FFCC00;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="10 8 16 12 10 16 10 8" fill="#FFCC00"></polygon>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Kuis -->
        <a href="{{ route('user.quiz') }}" style="flex: 1 1 0%; border-radius: 20px;" class="bg-white p-6 shadow-xl flex gap-4 transition-transform hover:-translate-y-2 duration-300">
            <div class="shrink-0 flex items-center justify-center rounded-md" style="width: 48px; height: 48px; background-color: #FFCC00; color: #090F31;">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
            </div>
            <div class="flex flex-col text-left">
                <h3 class="text-[#090F31] font-bold text-lg mb-2">Kuis</h3>
                <p class="text-sm leading-relaxed mb-4" style="color: rgba(9, 15, 49, 0.8);">Evaluasi pemahaman Anda dengan kuis.</p>
                <!-- Play Button -->
                <div class="mt-auto">
                    <svg class="w-8 h-8" style="color: #FFCC00;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="10 8 16 12 10 16 10 8" fill="#FFCC00"></polygon>
                    </svg>
                </div>
            </div>
        </a>

    </div>

    <!-- Chart Section -->
    <div class="bg-white p-6 lg:p-8 shadow-lg mb-8" style="border-radius: 20px;">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-bold text-[16px]" style="color: #090F31;">Kemajuan Belajar</h3>
            <p class="text-sm font-semibold" style="color: #090F31;">Rata-rata: <span class="text-[#FFCC00] font-bold">0</span>/100</p>
        </div>
        
        <div class="w-full bg-[#090F31] rounded-xl p-4 md:p-6 relative" style="height: 550px;">
            <canvas id="progressChart"></canvas>
        </div>
    </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('progressChart').getContext('2d');
        
        Chart.defaults.color = '#8A92A6';
        Chart.defaults.font.family = 'Inter';
        Chart.defaults.font.size = 11;

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Desain Siber', 'Phishing', 'Malware', 'Ransomware', 'Social Engineering', 'Password Security', 'Data Breach'],
                datasets: [{
                    label: 'Kemajuan Belajar',
                    data: [100, 50, 100, 15, 50, 80, 80],
                    borderColor: '#FFC107',
                    backgroundColor: '#FFC107',
                    borderWidth: 2,
                    pointBackgroundColor: '#FFC107',
                    pointBorderColor: '#FFC107',
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            boxWidth: 8,
                            boxHeight: 8,
                            usePointStyle: true,
                            pointStyle: 'rect',
                            padding: 20
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(9, 15, 49, 0.95)',
                        titleColor: '#fff',
                        bodyColor: '#FFC107',
                        borderColor: 'rgba(255, 255, 255, 0.1)',
                        borderWidth: 1,
                        padding: 10
                    }
                },
                scales: {
                    y: {
                        min: 0,
                        max: 100,
                        ticks: { stepSize: 10, autoSkip: false },
                        grid: { color: 'rgba(255, 255, 255, 0.06)' },
                        border: { display: false }
                    },
                    x: {
                        grid: { color: 'rgba(255, 255, 255, 0.06)' },
                        border: { display: false }
                    }
                }
            }
        });
    });
</script>
@endsection