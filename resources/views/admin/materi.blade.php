@extends('layouts.admin')

@section('content')
@php
$materis = [
    [
        'judul' => 'Dasar Keamanan Siber', 
        'deskripsi' => 'Pengenalan keamanan informasi serta ancaman digital yang umum terjadi di lingkungan kerja dan kehidupan sehari-hari.'
    ],
    [
        'judul' => 'Phishing', 
        'deskripsi' => 'Belajar mengenali email, website, maupun pesan palsu yang digunakan penyerang untuk mencuri informasi sensitif Anda.'
    ],
    [
        'judul' => 'Malware', 
        'deskripsi' => 'Memahami berbagai jenis malicious software seperti virus, worm, trojan, spyware, ransomware, dan cara menghindarinya.'
    ],
    [
        'judul' => 'Ransomware', 
        'deskripsi' => 'Memahami serangan ransomware yang mengenkripsi data, dampaknya yang menghancurkan, serta langkah-langkah pencegahannya.'
    ],
    [
        'judul' => 'Social Engineering', 
        'deskripsi' => 'Belajar mengenali teknik manipulasi psikologis yang digunakan penyerang untuk mendapatkan akses ke sistem dan informasi sensitif.'
    ],
    [
        'judul' => 'Password Security', 
        'deskripsi' => 'Belajar membuat kata sandi yang kuat dan aman, serta mengelola kredensial dengan praktik terbaik keamanan digital.'
    ],
    [
        'judul' => 'Clear Screen & Digital Hygiene', 
        'deskripsi' => 'Belajar menjaga keamanan perangkat dengan mengunci layar, menjaga kebersihan area kerja, dan mengamankan data saat meninggalkan komputer.'
    ]
];
@endphp

<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-[#090F31] mb-2" style="font-family: 'Inter', sans-serif;">
            Manajemen Materi
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
                        <th class="px-6 py-5 text-center w-1/3">Materi</th>
                        <th class="px-6 py-5 text-center w-1/2">Deskripsi</th>
                        <th class="px-6 py-5 text-center w-1/6">Aksi</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody class="text-sm">
                    @foreach($materis as $m)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <!-- Judul -->
                        <td class="px-6 py-5 text-left font-medium text-[#090F31]">
                            {{ $m['judul'] }}
                        </td>

                        <!-- Deskripsi -->
                        <td class="px-6 py-5 text-gray-600 text-[13px] leading-relaxed text-left pr-12">
                            {{ $m['deskripsi'] }}
                        </td>

                        <!-- Aksi -->
                        <td class="px-6 py-5 text-center">
                            <button onclick="openEditMateriModal(`{{ $m['judul'] }}`, `{{ $m['deskripsi'] }}`)" class="inline-flex items-center justify-center gap-1.5 px-4 py-1.5 rounded-md border border-[#00E676] text-[#00E676] hover:bg-[#00E676] hover:text-white transition-colors font-medium text-xs">
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

<!-- Edit Materi Modal -->
<div id="editMateriModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity p-4">
    <!-- Modal Container -->
    <div class="bg-[#0b112c] text-white rounded-2xl w-full max-w-3xl flex flex-col max-h-[90vh] shadow-2xl relative">
        
        <!-- Header: Keluar -->
        <div class="p-6 pb-2">
            <button type="button" onclick="closeEditMateriModal()" class="flex items-center gap-2 text-[#FFCC00] font-bold hover:text-yellow-400 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Keluar
            </button>
        </div>

        <!-- Form Content (Scrollable if needed) -->
        <div class="p-6 pt-2 overflow-y-auto custom-scrollbar">
            <form onsubmit="event.preventDefault(); closeEditMateriModal();" class="space-y-6">
                
                <!-- Judul Materi -->
                <div>
                    <label class="block text-sm font-bold mb-2">Judul Materi</label>
                    <input type="text" id="editJudul" class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-bold mb-2">Deskripsi</label>
                    <textarea id="editDeskripsi" rows="2" class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors resize-none"></textarea>
                </div>

                <!-- Isi Materi -->
                <div>
                    <div class="flex items-baseline gap-2 mb-2">
                        <label class="block text-sm font-bold">Isi Materi</label>
                        <span class="text-xs text-gray-500">(gunakan ## untuk judul section)</span>
                    </div>
                    <textarea id="editIsi" rows="10" class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors resize-none leading-relaxed">##Apa Itu Keamanan Siber?

Keamanan siber adalah praktik melindungi sistem, jaringan, program, dan data dari berbagai serangan digital yang bertujuan mengakses, mengubah, menghancurkan informasi sensitif, melakukan pemerasan, atau mengganggu aktivitas sistem.

Keamanan siber menjadi penting bagi semua pengguna internet, bukan hanya perusahaan atau pemerintah, karena setiap individu berpotensi menjadi target serangan yang dapat mengancam data pribadi, informasi keuangan, dan identitas digital.

Penerapan keamanan siber semakin menantang seiring bertambahnya jumlah perangkat yang terhubung ke internet dan semakin canggihnya metode serangan siber, sehingga diperlukan kesadaran serta langkah-langkah perlindungan yang tepat untuk menjaga keamanan data dan aktivitas digital.</textarea>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-4">
                    <button type="button" onclick="closeEditMateriModal()" class="flex-1 bg-white text-black font-bold py-3.5 rounded-xl hover:bg-gray-200 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 bg-[#FFCC00] text-black font-bold py-3.5 rounded-xl hover:bg-yellow-500 transition-colors">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openEditMateriModal(judul, deskripsi) {
        document.getElementById('editJudul').value = judul;
        document.getElementById('editDeskripsi').value = deskripsi;
        
        // Dummy data for 'Isi Materi' since it's not in the table
        if (judul !== 'Dasar Keamanan Siber') {
            document.getElementById('editIsi').value = "##" + judul + "\n\nIni adalah isi materi untuk " + judul + " yang dapat diedit oleh admin.";
        } else {
            document.getElementById('editIsi').value = "##Apa Itu Keamanan Siber?\n\nKeamanan siber adalah praktik melindungi sistem, jaringan, program, dan data dari berbagai serangan digital yang bertujuan mengakses, mengubah, menghancurkan informasi sensitif, melakukan pemerasan, atau mengganggu aktivitas sistem.\n\nKeamanan siber menjadi penting bagi semua pengguna internet, bukan hanya perusahaan atau pemerintah, karena setiap individu berpotensi menjadi target serangan yang dapat mengancam data pribadi, informasi keuangan, dan identitas digital.\n\nPenerapan keamanan siber semakin menantang seiring bertambahnya jumlah perangkat yang terhubung ke internet dan semakin canggihnya metode serangan siber, sehingga diperlukan kesadaran serta langkah-langkah perlindungan yang tepat untuk menjaga keamanan data dan aktivitas digital.";
        }

        const modal = document.getElementById('editMateriModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditMateriModal() {
        const modal = document.getElementById('editMateriModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
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
