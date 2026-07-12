@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto space-y-8">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-[#090F31]" style="font-family: 'Audiowide', sans-serif;">
            Dashboard <span class="text-[#FFCC00]">Admin</span>
        </h1>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Total Pengguna -->
        <div class="bg-white rounded-2xl border border-gray-200 p-6 flex items-center gap-6 shadow-sm">
            <div class="w-14 h-14 rounded-xl bg-[#FFCC00]/20 flex items-center justify-center shrink-0">
                <svg class="w-7 h-7 text-[#FFB300]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium mb-1">Total Pengguna</p>
                <h3 class="text-2xl font-bold text-[#090F31]">8</h3>
            </div>
        </div>

        <!-- Kuis Dikerjakan -->
        <div class="bg-white rounded-2xl border border-gray-200 p-6 flex items-center gap-6 shadow-sm">
            <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center shrink-0">
                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium mb-1">Kuis Dikerjakan</p>
                <h3 class="text-2xl font-bold text-[#090F31]">24</h3>
            </div>
        </div>

        <!-- Rata-rata Nilai -->
        <div class="bg-white rounded-2xl border border-gray-200 p-6 flex flex-col justify-center relative overflow-hidden shadow-sm">
            <div class="flex items-center gap-6 mb-3">
                <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center shrink-0">
                    <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 text-sm font-medium mb-1">Rata-rata nilai</p>
                    <h3 class="text-2xl font-bold text-green-500">81<span class="text-lg text-[#090F31]">/100</span></h3>
                </div>
            </div>
            <!-- Progress Bar at bottom of card -->
            <div class="absolute bottom-0 left-0 w-full h-1.5 flex px-6 pb-2">
                <div class="w-full h-1.5 bg-[#090F31] rounded-full overflow-hidden flex">
                    <div class="bg-green-500 h-full" style="width: 81%;"></div>
                </div>
            </div>
        </div>

    </div>

    <!-- Rata-rata Nilai per Kuis -->
    <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
        <h3 class="font-bold text-lg text-[#090F31] mb-6">Rata-rata Nilai per Kuis (Semua Pengguna)</h3>
        
        <div class="space-y-4">
            <!-- Item 1 -->
            <div class="flex items-center">
                <div class="w-48 shrink-0 pr-4">
                    <h4 class="text-xs font-bold text-[#090F31]">Dasar Keamanan Siber</h4>
                    <p class="text-[10px] text-gray-400">5 peserta</p>
                </div>
                <div class="flex-grow">
                    <div class="w-full h-6 bg-[#0b112c] rounded-full relative">
                        <div class="h-full bg-[#FFCC00] rounded-full flex items-center justify-end pr-3" style="width: 80%;">
                            <span class="text-[10px] font-bold text-[#090F31]">80</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="flex items-center">
                <div class="w-48 shrink-0 pr-4">
                    <h4 class="text-xs font-bold text-[#090F31]">Phishing</h4>
                    <p class="text-[10px] text-gray-400">4 peserta</p>
                </div>
                <div class="flex-grow">
                    <div class="w-full h-6 bg-[#0b112c] rounded-full relative">
                        <div class="h-full bg-[#FFCC00] rounded-full flex items-center justify-end pr-3" style="width: 71%;">
                            <span class="text-[10px] font-bold text-[#090F31]">71</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="flex items-center">
                <div class="w-48 shrink-0 pr-4">
                    <h4 class="text-xs font-bold text-[#090F31]">Password Security</h4>
                    <p class="text-[10px] text-gray-400">3 peserta</p>
                </div>
                <div class="flex-grow">
                    <div class="w-full h-6 bg-[#0b112c] rounded-full relative">
                        <div class="h-full bg-[#FFCC00] rounded-full flex items-center justify-end pr-3" style="width: 83%;">
                            <span class="text-[10px] font-bold text-[#090F31]">83</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="flex items-center">
                <div class="w-48 shrink-0 pr-4">
                    <h4 class="text-xs font-bold text-[#090F31]">Social Engineering</h4>
                    <p class="text-[10px] text-gray-400">3 peserta</p>
                </div>
                <div class="flex-grow">
                    <div class="w-full h-6 bg-[#0b112c] rounded-full relative">
                        <div class="h-full bg-[#FFCC00] rounded-full flex items-center justify-end pr-3" style="width: 67%;">
                            <span class="text-[10px] font-bold text-[#090F31]">67</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="flex items-center">
                <div class="w-48 shrink-0 pr-4">
                    <h4 class="text-xs font-bold text-[#090F31]">Malware</h4>
                    <p class="text-[10px] text-gray-400">3 peserta</p>
                </div>
                <div class="flex-grow">
                    <div class="w-full h-6 bg-[#0b112c] rounded-full relative">
                        <div class="h-full bg-[#FFCC00] rounded-full flex items-center justify-end pr-3" style="width: 83%;">
                            <span class="text-[10px] font-bold text-[#090F31]">83</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="flex items-center">
                <div class="w-48 shrink-0 pr-4">
                    <h4 class="text-xs font-bold text-[#090F31]">Ransomware</h4>
                    <p class="text-[10px] text-gray-400">3 peserta</p>
                </div>
                <div class="flex-grow">
                    <div class="w-full h-6 bg-[#0b112c] rounded-full relative">
                        <div class="h-full bg-[#FFCC00] rounded-full flex items-center justify-end pr-3" style="width: 89%;">
                            <span class="text-[10px] font-bold text-[#090F31]">89</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 7 -->
            <div class="flex items-center">
                <div class="w-48 shrink-0 pr-4">
                    <h4 class="text-xs font-bold text-[#090F31]">Clear Screen</h4>
                    <p class="text-[10px] text-gray-400">3 peserta</p>
                </div>
                <div class="flex-grow">
                    <div class="w-full h-6 bg-[#0b112c] rounded-full relative">
                        <div class="h-full bg-[#FFCC00] rounded-full flex items-center justify-end pr-3" style="width: 94%;">
                            <span class="text-[10px] font-bold text-[#090F31]">94</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Distribusi Nilai -->
    <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
        <h3 class="font-bold text-lg text-[#090F31] mb-6">Distribusi Nilai</h3>
        
        <div class="space-y-3">
            <!-- Range 90-100 -->
            <div class="flex items-center text-sm">
                <div class="w-16 shrink-0 font-medium text-[#090F31]">90-100</div>
                <div class="flex-grow">
                    <div class="w-full h-4 bg-[#0b112c] rounded-full overflow-hidden">
                        <div class="h-full bg-[#00E676] rounded-r-full" style="width: 35%;"></div>
                    </div>
                </div>
                <div class="w-8 shrink-0 text-right text-xs text-gray-600">7</div>
            </div>

            <!-- Range 80-89 -->
            <div class="flex items-center text-sm">
                <div class="w-16 shrink-0 font-medium text-[#090F31]">80-89</div>
                <div class="flex-grow">
                    <div class="w-full h-4 bg-[#0b112c] rounded-full overflow-hidden">
                        <div class="h-full bg-[#69F0AE] rounded-r-full" style="width: 45%;"></div>
                    </div>
                </div>
                <div class="w-8 shrink-0 text-right text-xs text-gray-600">9</div>
            </div>

            <!-- Range 70-79 -->
            <div class="flex items-center text-sm">
                <div class="w-16 shrink-0 font-medium text-[#090F31]">70-79</div>
                <div class="flex-grow">
                    <div class="w-full h-4 bg-[#0b112c] rounded-full overflow-hidden">
                        <div class="h-full bg-[#FF9800] rounded-r-full" style="width: 10%;"></div>
                    </div>
                </div>
                <div class="w-8 shrink-0 text-right text-xs text-gray-600">2</div>
            </div>

            <!-- Range 60-69 -->
            <div class="flex items-center text-sm">
                <div class="w-16 shrink-0 font-medium text-[#090F31]">60-69</div>
                <div class="flex-grow">
                    <div class="w-full h-4 bg-[#0b112c] rounded-full overflow-hidden">
                        <div class="h-full bg-[#FFCC00] rounded-r-full" style="width: 25%;"></div>
                    </div>
                </div>
                <div class="w-8 shrink-0 text-right text-xs text-gray-600">5</div>
            </div>

            <!-- Range <60 -->
            <div class="flex items-center text-sm">
                <div class="w-16 shrink-0 font-medium text-[#090F31]">&lt;60</div>
                <div class="flex-grow">
                    <div class="w-full h-4 bg-[#0b112c] rounded-full overflow-hidden">
                        <div class="h-full bg-[#CC0000] rounded-r-full" style="width: 15%;"></div>
                    </div>
                </div>
                <div class="w-8 shrink-0 text-right text-xs text-gray-600">3</div>
            </div>
        </div>

        <div class="mt-8 pt-4 flex flex-col w-full border-t border-gray-100 text-sm font-bold text-[#090F31]">
            <div class="flex justify-between w-full mb-1">
                <span>Total Nilai</span>
                <span>24</span>
            </div>
            <div class="flex justify-between w-full text-[#00E676]">
                <span>Nilai ≥ 80</span>
                <span>16 (67%)</span>
            </div>
        </div>
    </div>

</div>
@endsection