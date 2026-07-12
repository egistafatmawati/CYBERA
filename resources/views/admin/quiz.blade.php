@extends('layouts.admin')

@section('content')
@php
$quizzes = [
    [
        'judul' => 'Phishing Email', 
        'deskripsi' => 'Uji kemampuan mengenali ciri-ciri email phishing dan membedakannya dari email resmi.',
        'soal' => '6 soal'
    ],
    [
        'judul' => 'Website Palsu', 
        'deskripsi' => 'Uji pemahaman dalam mengidentifikasi website palsu yang meniru situs resmi.',
        'soal' => '6 soal'
    ],
    [
        'judul' => 'Password Security', 
        'deskripsi' => 'Kuis tentang praktik pengelolaan kredensial dan pembuatan password yang kuat.',
        'soal' => '6 soal'
    ],
    [
        'judul' => 'Social Engineering', 
        'deskripsi' => 'Uji pemahaman terkait teknik manipulasi psikologis dan cara pencegahannya.',
        'soal' => '6 soal'
    ],
    [
        'judul' => 'Malware', 
        'deskripsi' => 'Kuis identifikasi jenis-jenis malicious software dan cara kerja infeksinya.',
        'soal' => '6 soal'
    ],
    [
        'judul' => 'Ransomware', 
        'deskripsi' => 'Kuis mengenai langkah penanganan dan pencegahan serangan ransomware.',
        'soal' => '6 soal'
    ],
    [
        'judul' => 'Clear Screen', 
        'deskripsi' => 'Uji pemahaman mengenai kebiasaan keamanan fisik dan digital hygiene.',
        'soal' => '6 soal'
    ],
];
@endphp

<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-[#090F31] mb-2" style="font-family: 'Inter', sans-serif;">
            Manajemen Kuis
        </h1>
        <p class="text-gray-600 text-sm">
            <span class="font-bold text-[#090F31]">7</span> Kuis, total <span class="font-bold text-[#090F31]">42</span> soal
        </p>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <!-- Table Head -->
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200 text-sm text-[#090F31] font-bold uppercase tracking-wider">
                        <th class="px-6 py-5 text-center w-1/4">Kuis</th>
                        <th class="px-6 py-5 text-center w-5/12">Deskripsi</th>
                        <th class="px-6 py-5 text-center w-1/6">Soal</th>
                        <th class="px-6 py-5 text-center w-1/6">Aksi</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody class="text-sm">
                    @foreach($quizzes as $q)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <!-- Judul Kuis -->
                        <td class="px-6 py-5 text-left font-medium text-[#090F31]">
                            {{ $q['judul'] }}
                        </td>

                        <!-- Deskripsi -->
                        <td class="px-6 py-5 text-gray-600 text-[13px] leading-relaxed text-left pr-12">
                            {{ $q['deskripsi'] }}
                        </td>

                        <!-- Soal -->
                        <td class="px-6 py-5 text-center">
                            <span class="px-3 py-1 bg-cyan-50 text-cyan-500 text-[11px] font-bold rounded-full">
                                {{ $q['soal'] }}
                            </span>
                        </td>

                        <!-- Aksi -->
                        <td class="px-6 py-5 text-center">
                            <button onclick="openEditQuizModal(`{{ $q['judul'] }}`, `{{ $q['deskripsi'] }}`)" class="inline-flex items-center justify-center gap-1.5 px-4 py-1.5 rounded-md border border-[#00E676] text-[#00E676] hover:bg-[#00E676] hover:text-white transition-colors font-medium text-xs">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                                Edit
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Quiz Modal (Alpine.js Powered) -->
<div id="editQuizModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity p-4 md:p-8"
    x-data="{
        judul: '',
        deskripsi: '',
        soals: [],
        
        initModal(event) {
            this.judul = event.detail.judul;
            this.deskripsi = event.detail.deskripsi;
            // Pre-fill dengan data dummy 2 soal agar sesuai dengan contoh gambar
            this.soals = [
                {
                    pertanyaan: 'Ini adalah email phishing! Bank tidak akan pernah meminta Anda mengklik tautan dari domain tidak resmi. Domain resmi BNI adalah bni.co.id. Selain itu, bank selalu menyapa nasabah dengan nama lengkap, bukan \'Nasabah Setia\'.',
                    opsi: ['Tidak, Ini Aman', 'Tidak, Ini Aman', 'Tidak, Ini Aman', 'Tidak, Ini Aman'],
                    jawaban_benar: 0,
                    penjelasan: 'Ini adalah email phishing! Bank tidak akan pernah meminta Anda mengklik tautan dari domain tidak resmi. Domain resmi BNI adalah bni.co.id. Selain itu, bank selalu menyapa nasabah dengan nama lengkap, bukan \'Nasabah Setia\'.'
                },
                {
                    pertanyaan: 'Ini adalah email phishing! Bank tidak akan pernah meminta Anda mengklik tautan dari domain tidak resmi. Domain resmi BNI adalah bni.co.id. Selain itu, bank selalu menyapa nasabah dengan nama lengkap, bukan \'Nasabah Setia\'.',
                    opsi: ['Tidak, Ini Aman', 'Tidak, Ini Aman', 'Tidak, Ini Aman', 'Tidak, Ini Aman'],
                    jawaban_benar: 0,
                    penjelasan: 'Ini adalah email phishing! Bank tidak akan pernah meminta Anda mengklik tautan dari domain tidak resmi. Domain resmi BNI adalah bni.co.id. Selain itu, bank selalu menyapa nasabah dengan nama lengkap, bukan \'Nasabah Setia\'.'
                }
            ];
        },
        
        tambahSoal() {
            this.soals.push({
                pertanyaan: '',
                opsi: ['', '', '', ''],
                jawaban_benar: 0,
                penjelasan: ''
            });
            // Auto scroll ke bawah setelah menambahkan soal
            setTimeout(() => {
                const form = document.getElementById('editQuizForm');
                form.scrollTop = form.scrollHeight;
            }, 100);
        }
    }"
    @open-edit-modal.window="initModal($event); $el.classList.remove('hidden'); $el.classList.add('flex')"
    @close-edit-modal.window="$el.classList.add('hidden'); $el.classList.remove('flex')">
    
    <!-- Modal Box -->
    <div class="bg-[#0b112c] text-white rounded-3xl w-full max-w-5xl flex flex-col max-h-[90vh] shadow-[0_0_50px_rgba(0,0,0,0.5)] relative overflow-hidden border border-gray-700" @click.stop>

    <!-- Header: Keluar -->
    <div class="p-6 border-b border-gray-800 flex items-center bg-[#0b112c]">
        <button type="button" @click="$dispatch('close-edit-modal')" class="flex items-center gap-2 text-[#FFCC00] font-bold hover:text-yellow-400 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Keluar
        </button>
    </div>

    <!-- Form Content -->
    <form id="editQuizForm" class="flex-1 overflow-y-auto custom-scrollbar p-6 lg:px-20 bg-[#0b112c]" onsubmit="event.preventDefault(); $dispatch('close-edit-modal');">
        <div class="max-w-4xl mx-auto space-y-6">
            
            <!-- Judul Kuis -->
            <div>
                <label class="block text-sm font-bold mb-2">Judul Kuis</label>
                <input type="text" name="judul" x-model="judul" class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00]">
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-bold mb-2">Deskripsi</label>
                <input type="text" name="deskripsi" x-model="deskripsi" class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00]">
            </div>

            <!-- Soal Header -->
            <div class="flex justify-between items-center mt-12 mb-4">
                <h3 class="font-bold text-lg text-white">Soal (<span x-text="soals.length"></span>)</h3>
                <button type="button" @click="tambahSoal()" class="bg-[#FFCC00] text-black text-xs font-bold px-4 py-2 rounded-full hover:bg-yellow-500 transition-colors flex items-center gap-1">
                    <span class="text-lg leading-none">+</span> Tambah
                </button>
            </div>

            <!-- Soal List (Dinamis dengan Alpine.js) -->
            <div class="space-y-8 pb-10">
                <template x-for="(soal, index) in soals" :key="index">
                    <div>
                        <h4 class="text-[#FFCC00] font-bold text-sm mb-3" x-text="'Soal ' + (index + 1)"></h4>
                        <div class="border border-gray-600 rounded-xl p-6 bg-[#050a24]">
                            
                            <!-- Pertanyaan -->
                            <div class="mb-6">
                                <label class="block text-sm font-bold mb-2">Pertanyaan</label>
                                <textarea :name="'soal['+index+'][pertanyaan]'" x-model="soal.pertanyaan" rows="3" class="w-full bg-[#0b112c] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] resize-none"></textarea>
                            </div>

                            <!-- Opsi Jawaban -->
                            <div class="mb-6">
                                <label class="block text-sm font-bold mb-3">
                                    Opsi Jawaban <span class="text-xs font-normal text-gray-400 ml-1">(klik tombol centang untuk jawaban benar)</span>
                                </label>
                                <div class="space-y-3">
                                    <template x-for="(opsi, opsiIndex) in soal.opsi" :key="opsiIndex">
                                        <div class="flex items-center gap-4">
                                            <!-- Custom Radio Button for Jawaban Benar -->
                                            <div class="relative flex items-center justify-center shrink-0">
                                                <input type="radio" :name="'soal['+index+'][jawaban_benar]'" :value="opsiIndex" x-model="soal.jawaban_benar" class="peer appearance-none w-6 h-6 border border-gray-500 rounded-full checked:border-[#FFCC00] cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#FFCC00] focus:ring-offset-2 focus:ring-offset-[#0b112c]">
                                                <!-- Titik kuning di tengah radio button (hanya muncul saat diceklis) -->
                                                <div class="absolute w-3 h-3 bg-[#FFCC00] rounded-full hidden peer-checked:block pointer-events-none"></div>
                                            </div>
                                            <!-- Input Text Opsi -->
                                            <input type="text" :name="'soal['+index+'][opsi]['+opsiIndex+']'" x-model="soals[index].opsi[opsiIndex]" class="flex-1 bg-[#0b112c] border border-gray-600 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00]">
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Penjelasan Jawaban -->
                            <div>
                                <label class="block text-sm font-bold mb-2">Penjelasan Jawaban</label>
                                <textarea :name="'soal['+index+'][penjelasan]'" x-model="soal.penjelasan" rows="2" class="w-full bg-[#0b112c] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] resize-none"></textarea>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </form>

    <!-- Footer Buttons -->
    <div class="bg-[#0b112c] border-t border-gray-800 p-6 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)]">
        <div class="max-w-4xl mx-auto flex gap-4">
            <button type="button" @click="$dispatch('close-edit-modal')" class="flex-1 bg-white text-black font-bold py-3.5 rounded-xl hover:bg-gray-200 transition-colors">
                Batal
            </button>
            <!-- Tombol simpan ini di kehidupan nyata akan submit form di atas -->
            <button type="button" @click="$dispatch('close-edit-modal')" class="flex-1 bg-[#FFCC00] text-black font-bold py-3.5 rounded-xl hover:bg-yellow-500 transition-colors">
                Simpan
            </button>
        </div>
    </div>
    </div>
</div>

<script>
    // Fungsi ini dipanggil saat tombol Edit di tabel ditekan
    function openEditQuizModal(judul, deskripsi) {
        window.dispatchEvent(new CustomEvent('open-edit-modal', {
            detail: { judul: judul, deskripsi: deskripsi }
        }));
    }
</script>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #050a24;
        border-radius: 8px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #1e2a6d;
        border-radius: 8px;
    }
</style>

@endsection
