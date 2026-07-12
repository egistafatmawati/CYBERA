@extends('layouts.admin')

@section('content')
@php
$simulasis = [
    [
        'judul' => 'Phishing Email', 
        'deskripsi' => 'Kenali ciri-ciri email phishing dan bedakan dari email resmi melalui skenario interaktif.',
        'skenario' => '3 skenario'
    ],
    [
        'judul' => 'Website Palsu', 
        'deskripsi' => 'Belajar mengidentifikasi website palsu yang meniru situs resmi untuk mencuri kredensial login Anda.',
        'skenario' => '3 skenario'
    ],
    [
        'judul' => 'Password Security', 
        'deskripsi' => 'Uji kemampuan Anda dalam mengidentifikasi password yang aman dan praktik pengelolaan kredensial.',
        'skenario' => '3 skenario'
    ],
    [
        'judul' => 'Social Engineering', 
        'deskripsi' => 'Hadapi berbagai skenario manipulasi psikologis dan belajar cara meresponsnya dengan tepat.',
        'skenario' => '3 skenario'
    ],
    [
        'judul' => 'Malware', 
        'deskripsi' => 'Identifikasi situasi berisiko malware dan pelajari respons yang tepat untuk setiap skenario.',
        'skenario' => '3 skenario'
    ],
    [
        'judul' => 'Ransomware', 
        'deskripsi' => 'Simulasikan respons terhadap indikasi serangan ransomware dan belajar langkah mitigasi yang tepat.',
        'skenario' => '3 skenario'
    ],
    [
        'judul' => 'Clear Screen', 
        'deskripsi' => 'Praktikkan kebiasaan digital hygiene dalam berbagai situasi kerja sehari-hari.',
        'skenario' => '3 skenario'
    ]
];
@endphp

<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-[#090F31] mb-2" style="font-family: 'Inter', sans-serif;">
            Manajemen Simulasi
        </h1>
        <p class="text-gray-600 text-sm">
            <span class="font-bold text-[#090F31]">7</span> Materi pembelajaran
        </p>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <!-- Table Head -->
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200 text-sm text-[#090F31] font-bold uppercase tracking-wider">
                        <th class="px-6 py-5 text-center w-1/4">Simulasi</th>
                        <th class="px-6 py-5 text-center w-5/12">Deskripsi</th>
                        <th class="px-6 py-5 text-center w-1/6">Skenario</th>
                        <th class="px-6 py-5 text-center w-1/6">Aksi</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody class="text-sm">
                    @foreach($simulasis as $s)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <!-- Judul -->
                        <td class="px-6 py-5 text-left font-medium text-[#090F31]">
                            {{ $s['judul'] }}
                        </td>

                        <!-- Deskripsi -->
                        <td class="px-6 py-5 text-gray-600 text-[13px] leading-relaxed text-left pr-12">
                            {{ $s['deskripsi'] }}
                        </td>

                        <!-- Skenario -->
                        <td class="px-6 py-5 text-center">
                            <span class="px-3 py-1 bg-cyan-50 text-cyan-500 text-[11px] font-bold rounded-full">
                                {{ $s['skenario'] }}
                            </span>
                        </td>

                        <!-- Aksi -->
                        <td class="px-6 py-5 text-center">
                            <button onclick="openEditSimulasiModal(`{{ $s['judul'] }}`, `{{ $s['deskripsi'] }}`)" class="inline-flex items-center justify-center gap-1.5 px-4 py-1.5 rounded-md border border-[#00E676] text-[#00E676] hover:bg-[#00E676] hover:text-white transition-colors font-medium text-xs">
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

<!-- Edit Simulasi Modal -->
<div id="editSimulasiModal" class="fixed inset-0 z-[100] items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity p-4"
    x-data="{
        isOpen: false,
        judul: '',
        deskripsi: '',
        tipe: '4-opsi',
        skenarios: [],
        
        initModal(j, d) {
            this.judul = j;
            this.deskripsi = d;
            
            if (j === 'Phishing Email' || j === 'Website Palsu') {
                this.tipe = '2-opsi';
                this.skenarios = [
                    {
                        skenario_teks: 'Dari: security@bankbni.co.id\n\nSubjek: URGENT: Akun Anda Terdeteksi Aktivitas Mencurigakan!\n\nYth. Nasabah Setia BNI,\n\nSistem kami mendeteksi adanya upaya login...',
                        pertanyaan: 'Apakah Email ini Phishing?',
                        opsi: ['Ya, Ini Phishing', 'Tidak, Ini Aman'],
                        jawaban_benar: 0,
                        penjelasan: 'Ini adalah email phishing! Bank tidak akan pernah meminta Anda mengklik tautan dari domain tidak resmi.'
                    },
                    {
                        skenario_teks: 'Dari: info@paypal-update.com\n\nSubjek: Konfirmasi Pembayaran Anda\n\nKami mendeteksi aktivitas login yang tidak wajar...',
                        pertanyaan: 'Apakah Email ini Phishing?',
                        opsi: ['Ya, Ini Phishing', 'Tidak, Ini Aman'],
                        jawaban_benar: 0,
                        penjelasan: 'Domain paypal-update.com bukan merupakan domain resmi PayPal.'
                    }
                ];
            } else if (j === 'Social Engineering') {
                this.tipe = 'percakapan';
                this.skenarios = [
                    {
                        skenario_teks: 'Telepon dari \'Customer Service Bank\'\n\nAnda menerima telepon dari seseorang yang mengaku sebagai customer service bank Anda...',
                        percakapan: [
                            { pengirim: 'Penelepon', pesan: 'Selamat siang, Bapak/Ibu Budi Santoso? Saya Andi dari Customer Service BCA. Kami mendeteksi transaksi mencurigakan sebesar Rp 2.500.000...' },
                            { pengirim: 'Anda', pesan: 'Transaksi apa? Saya tidak melakukan transaksi apa pun!' }
                        ],
                        pertanyaan: 'Apa yang harus Anda lakukan?',
                        opsi: ['Berikan data yang diminta agar akun segera diblokir', 'Tutup telepon dan hubungi nomor resmi bank yang tertera di kartu ATM Anda', 'Tanyakan baik identitas penelepon secara detail', 'Ikuti instruksinya karena dia tahu nama dan bank Anda'],
                        jawaban_benar: 1,
                        penjelasan: 'Ini social engineering tipe vishing (voice phishing)! Bank TIDAK PERNAH meminta nomor kartu lengkap, CVV, PIN, atau OTP melalui telepon.'
                    },
                    {
                        skenario_teks: 'Pesan WhatsApp dari \'Teman Dekat\'\n\nSeorang teman lama tiba-tiba menghubungi meminjam uang...',
                        percakapan: [
                            { pengirim: 'Teman', pesan: 'Bro, bisa pinjam uang 1 juta? M-banking gue lagi error nih, butuh cepat.' },
                            { pengirim: 'Anda', pesan: 'Wah kenapa bro?' }
                        ],
                        pertanyaan: 'Apa langkah paling aman?',
                        opsi: ['Langsung transfer', 'Abaikan pesannya', 'Telepon nomornya langsung atau video call untuk verifikasi suara/wajah', 'Blokir nomornya'],
                        jawaban_benar: 2,
                        penjelasan: 'Akun WhatsApp teman Anda mungkin diretas (takeover). Verifikasi suara/wajah adalah cara paling ampuh.'
                    }
                ];
            } else {
                this.tipe = '4-opsi';
                this.skenarios = [
                    {
                        skenario_teks: 'Ini adalah dummy skenario pertama untuk malware...',
                        pertanyaan: 'Apa indikasi utama dari malware ini?',
                        opsi: ['Kinerja melambat drastis', 'Muncul banyak pop-up', 'Aplikasi asing terinstal', 'Semua jawaban benar'],
                        jawaban_benar: 3,
                        penjelasan: 'Semua hal di atas adalah indikasi umum infeksi malware.'
                    },
                    {
                        skenario_teks: 'Ini adalah dummy skenario kedua untuk malware...',
                        pertanyaan: 'Langkah pertama yang harus dilakukan adalah?',
                        opsi: ['Format ulang PC', 'Putuskan koneksi internet', 'Biarkan saja', 'Bayar tebusan'],
                        jawaban_benar: 1,
                        penjelasan: 'Memutuskan koneksi mencegah malware menyebar atau mencuri lebih banyak data ke server peretas.'
                    }
                ];
            }
            
            this.isOpen = true;
        },
        
        closeModal() {
            this.isOpen = false;
        },

        addPercakapan(sIndex) {
            this.skenarios[sIndex].percakapan.push({ pengirim: '', pesan: '' });
        },

        removePercakapan(sIndex, pIndex) {
            this.skenarios[sIndex].percakapan.splice(pIndex, 1);
        }
    }"
    x-show="isOpen"
    style="display: none;"
    :class="isOpen ? 'flex' : 'hidden'"
    @open-simulasi-modal.window="initModal($event.detail.judul, $event.detail.deskripsi)">
    
    <!-- Modal Container -->
    <div class="bg-[#0b112c] text-white rounded-2xl w-full max-w-4xl flex flex-col max-h-[90vh] shadow-2xl relative border border-gray-700">
        
        <!-- Header: Keluar -->
        <div class="p-5 md:p-6 border-b border-gray-800">
            <button type="button" @click="closeModal()" class="flex items-center gap-2 text-[#FFCC00] font-bold hover:text-yellow-400 transition-colors text-sm md:text-base w-max">
                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Keluar
            </button>
        </div>

        <!-- Form Content (Scrollable) -->
        <div class="flex-1 p-5 md:p-6 overflow-y-auto custom-scrollbar">
            <form id="simulasiForm" onsubmit="event.preventDefault();" class="space-y-6">
                
                <!-- Judul Simulasi -->
                <div>
                    <label class="block text-sm font-bold mb-2">Judul Simulasi</label>
                    <input type="text" x-model="judul" :name="'judul'" class="w-full bg-[#050a24] border border-gray-700 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-bold mb-2">Deskripsi</label>
                    <textarea x-model="deskripsi" :name="'deskripsi'" rows="3" class="w-full bg-[#050a24] border border-gray-700 rounded-lg px-4 py-3 text-sm text-gray-300 focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors resize-none"></textarea>
                </div>

                <div class="pt-2">
                    <h3 class="text-white font-bold" x-text="`Simulasi (${skenarios.length})`"></h3>
                </div>

                <!-- Skenarios Loop -->
                <template x-for="(skenario, sIndex) in skenarios" :key="sIndex">
                    <div class="mb-8">
                        <h4 class="text-[#FFCC00] font-bold text-sm mb-3" x-text="`Skenario ${sIndex + 1}`"></h4>
                        <div class="border border-gray-700 rounded-xl p-4 md:p-6 bg-white/5">
                            
                            <!-- Skenario Teks -->
                            <div class="mb-5">
                                <label class="block text-sm font-bold mb-2">Skenario</label>
                                <textarea x-model="skenario.skenario_teks" :name="`skenario[${sIndex}][teks_skenario]`" rows="6" class="w-full bg-[#050a24] border border-gray-700 rounded-lg px-4 py-3 text-sm text-gray-300 focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors resize-none"></textarea>
                            </div>

                            <!-- Percakapan (Only for Social Engineering) -->
                            <template x-if="tipe === 'percakapan'">
                                <div class="mb-5">
                                    <div class="flex justify-between items-center mb-3">
                                        <label class="block text-sm font-bold text-[#FFCC00]">Pesan/Percakapan</label>
                                        <button type="button" @click="addPercakapan(sIndex)" class="bg-[#FFCC00] text-black text-[10px] md:text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1 hover:bg-yellow-500 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                                            Tambah
                                        </button>
                                    </div>
                                    <div class="space-y-4">
                                        <template x-for="(bubble, pIndex) in skenario.percakapan" :key="pIndex">
                                            <div class="relative">
                                                <label class="block text-xs font-bold mb-1 text-gray-400">bubble</label>
                                                <div class="border border-gray-700 rounded-lg bg-[#050a24] p-3 flex flex-col gap-2">
                                                    <div class="flex justify-between items-center">
                                                        <input type="text" x-model="bubble.pengirim" :name="`skenario[${sIndex}][percakapan][${pIndex}][pengirim]`" placeholder="Pengirim (ex: Anda / Penelepon)" class="bg-transparent border-none text-sm text-[#FFCC00] font-bold focus:outline-none w-full">
                                                        <button type="button" @click="removePercakapan(sIndex, pIndex)" class="text-gray-500 hover:text-red-500 transition-colors">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                        </button>
                                                    </div>
                                                    <textarea x-model="bubble.pesan" :name="`skenario[${sIndex}][percakapan][${pIndex}][pesan]`" rows="2" placeholder="Isi pesan..." class="bg-transparent border-none text-sm text-gray-300 focus:outline-none w-full resize-none"></textarea>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </template>

                            <!-- Pertanyaan -->
                            <div class="mb-5">
                                <label class="block text-sm font-bold mb-2">Pertanyaan</label>
                                <input type="text" x-model="skenario.pertanyaan" :name="`skenario[${sIndex}][pertanyaan]`" class="w-full bg-[#050a24] border border-gray-700 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                            </div>

                            <!-- Opsi Jawaban -->
                            <div class="mb-5">
                                <label class="block text-sm font-bold mb-2">Opsi Jawaban <span class="text-[10px] font-normal text-gray-400 ml-1">(klik tombol bulat untuk jawaban benar)</span></label>
                                <div class="space-y-3">
                                    <template x-for="(opt, oIndex) in skenario.opsi" :key="oIndex">
                                        <div class="flex items-center gap-3">
                                            <!-- Radio for correct answer -->
                                            <div class="relative flex items-center justify-center w-5 h-5 flex-shrink-0">
                                                <input type="radio" :name="`skenario[${sIndex}][jawaban_benar]`" :value="oIndex" x-model="skenario.jawaban_benar" class="peer appearance-none w-5 h-5 border border-gray-500 rounded-full checked:border-[#FFCC00] cursor-pointer transition-colors">
                                                <div class="absolute w-2.5 h-2.5 bg-[#FFCC00] rounded-full hidden peer-checked:block pointer-events-none"></div>
                                            </div>
                                            <!-- Option Text -->
                                            <input type="text" x-model="skenario.opsi[oIndex]" :name="`skenario[${sIndex}][opsi][${oIndex}]`" class="flex-1 bg-[#050a24] border border-gray-700 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Penjelasan Jawaban -->
                            <div>
                                <label class="block text-sm font-bold mb-2">Penjelasan Jawaban</label>
                                <textarea x-model="skenario.penjelasan" :name="`skenario[${sIndex}][penjelasan]`" rows="4" class="w-full bg-[#050a24] border border-gray-700 rounded-lg px-4 py-3 text-sm text-gray-300 focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors resize-none"></textarea>
                            </div>

                        </div>
                    </div>
                </template>
            </form>
        </div>

        <!-- Footer Buttons -->
        <div class="bg-[#0b112c] border-t border-gray-800 p-5 md:p-6 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)] rounded-b-2xl">
            <div class="flex gap-4">
                <button type="button" @click="closeModal()" class="flex-1 bg-white text-black font-bold py-3.5 rounded-xl hover:bg-gray-200 transition-colors">
                    Batal
                </button>
                <button type="submit" form="simulasiForm" class="flex-1 bg-[#FFCC00] text-black font-bold py-3.5 rounded-xl hover:bg-yellow-500 transition-colors shadow-[0_0_15px_rgba(255,204,0,0.3)]">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function openEditSimulasiModal(judul, deskripsi) {
        window.dispatchEvent(new CustomEvent('open-simulasi-modal', {
            detail: { judul: judul, deskripsi: deskripsi }
        }));
    }
</script>

<style>
    /* Custom scrollbar for textareas inside dark modal */
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
