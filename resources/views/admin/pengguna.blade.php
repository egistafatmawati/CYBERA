@extends('layouts.admin')

@section('content')
@php
$penggunas = [
    ['inisial' => 'AP', 'nama' => 'Andi Pratama', 'email' => 'andi.pratama@bssn.go.id', 'role' => 'Peserta', 'kuis' => '4 selesai', 'rata_rata' => 75, 'bergabung' => '15 Januari 2026'],
    ['inisial' => 'SR', 'nama' => 'Siti Rahayu', 'email' => 'siti.rahayu@bssn.go.id', 'role' => 'Peserta', 'kuis' => '5 selesai', 'rata_rata' => 93, 'bergabung' => '20 Januari 2026'],
    ['inisial' => 'BS', 'nama' => 'Budi Santoso', 'email' => 'budi.santoso@bssn.go.id', 'role' => 'Peserta', 'kuis' => '2 selesai', 'rata_rata' => 59, 'bergabung' => '1 Februari 2026'],
    ['inisial' => 'DL', 'nama' => 'Dewi Lestari', 'email' => 'dewi.lestari@bssn.go.id', 'role' => 'Peserta', 'kuis' => '3 selesai', 'rata_rata' => 72, 'bergabung' => '10 Februari 2026'],
    ['inisial' => 'EW', 'nama' => 'Eko Wijaya', 'email' => 'eko.wijaya@bssn.go.id', 'role' => 'Peserta', 'kuis' => '3 selesai', 'rata_rata' => 72, 'bergabung' => '15 Februari 2026'],
    ['inisial' => 'FH', 'nama' => 'Fitri Handayani', 'email' => 'fitri.handayani@bssn.go.id', 'role' => 'Peserta', 'kuis' => '2 selesai', 'rata_rata' => 75, 'bergabung' => '1 Maret 2026'],
    ['inisial' => 'GK', 'nama' => 'Gunawan Kusuma', 'email' => 'gunawan.kusuma@bssn.go.id', 'role' => 'Peserta', 'kuis' => '4 selesai', 'rata_rata' => 96, 'bergabung' => '5 Maret 2026'],
    ['inisial' => 'HG', 'nama' => 'Hendra Gunawan', 'email' => 'hendra.gunawan@bssn.go.id', 'role' => 'Peserta', 'kuis' => '1 selesai', 'rata_rata' => 83, 'bergabung' => '10 Maret 2026'],
];
@endphp

<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-[#090F31] mb-2" style="font-family: 'Inter', sans-serif;">
            Manajemen Pengguna
        </h1>
        <p class="text-gray-600 text-sm">
            <span class="font-bold text-[#090F31]">8</span> Terdaftar, <span class="font-bold text-[#FFCC00]">8</span> Aktif
        </p>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <!-- Table Head -->
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs text-[#090F31] font-bold uppercase tracking-wider">
                        <th class="px-6 py-4">Pengguna</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4">Kuis</th>
                        <th class="px-6 py-4">Rata-rata</th>
                        <th class="px-6 py-4">Bergabung</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody class="text-sm">
                    @foreach($penggunas as $p)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <!-- Pengguna -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-[#FFCC00]/10 flex items-center justify-center shrink-0">
                                    <span class="text-[#FFB300] font-bold text-xs">{{ $p['inisial'] }}</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-[#090F31]">{{ $p['nama'] }}</div>
                                    <div class="text-[11px] text-gray-500">{{ $p['email'] }}</div>
                                </div>
                            </div>
                        </td>

                        <!-- Role -->
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-cyan-50 text-cyan-500 text-xs font-bold rounded-full">
                                {{ $p['role'] }}
                            </span>
                        </td>

                        <!-- Kuis -->
                        <td class="px-6 py-4 text-gray-600 text-xs font-medium">
                            {{ $p['kuis'] }}
                        </td>

                        <!-- Rata-rata -->
                        <td class="px-6 py-4 font-bold text-sm">
                            @if($p['rata_rata'] < 60)
                                <span class="text-[#CC0000]">{{ $p['rata_rata'] }}/100</span>
                            @elseif($p['rata_rata'] < 80)
                                <span class="text-[#FFCC00]">{{ $p['rata_rata'] }}/100</span>
                            @else
                                <span class="text-[#00E676]">{{ $p['rata_rata'] }}/100</span>
                            @endif
                        </td>

                        <!-- Bergabung -->
                        <td class="px-6 py-4 text-gray-500 text-xs">
                            {{ $p['bergabung'] }}
                        </td>

                        <!-- Aksi -->
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-3">
                                <button onclick="openEditUserModal('{{ $p['nama'] }}')" class="text-green-500 hover:text-green-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </button>
                                <button onclick="openDeleteUserModal()" class="text-red-500 hover:text-red-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Pengguna Modal -->
<div id="editUserModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity">
    <div class="bg-[#0b112c] text-white rounded-2xl w-full max-w-sm mx-4 p-8 border border-[#1e2a6d] shadow-2xl relative">
        
        <!-- Title -->
        <h2 class="text-2xl text-center mb-8" style="font-family: 'Audiowide', sans-serif;">
            Edit Pengguna
        </h2>

        <!-- Form -->
        <form onsubmit="event.preventDefault(); closeEditUserModal();" class="space-y-6">
            
            <!-- Nama -->
            <div>
                <label class="block text-sm font-bold mb-2">Nama</label>
                <input type="text" id="editNama" placeholder="Masukkan nama" class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-bold mb-2">Email</label>
                <div class="relative">
                    <!-- Placeholder in image says 'Masukkan password' but we'll use email to make sense, while keeping the UI identical -->
                    <input type="email" id="editEmail" placeholder="Masukkan email" class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                    <!-- Eye Icon (from user's design image, although weird for email) -->
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 pt-4">
                <button type="button" onclick="closeEditUserModal()" class="flex-1 bg-white text-black font-bold py-3 rounded-xl hover:bg-gray-200 transition-colors">
                    Kembali
                </button>
                <button type="submit" class="flex-1 bg-[#FFCC00] text-black font-bold py-3 rounded-xl hover:bg-yellow-500 transition-colors">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Pengguna Modal -->
<div id="deleteUserModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity">
    <div class="bg-white text-black rounded-3xl w-full max-w-sm mx-4 p-8 pt-10 pb-10 shadow-2xl relative flex flex-col items-center">
        
        <!-- Question Mark Icon -->
        <div class="w-16 h-16 rounded-full bg-[#C80000] flex items-center justify-center mb-6">
            <span class="text-white text-4xl font-bold font-sans">?</span>
        </div>

        <!-- Title -->
        <h2 class="text-xl text-center font-bold text-[#C80000] mb-8 px-4 leading-snug">
            Apakah kamu yakin untuk menghapus Pengguna?
        </h2>

        <!-- Buttons -->
        <div class="flex gap-4 w-full">
            <button type="button" onclick="closeDeleteUserModal()" class="flex-1 bg-black text-white font-bold py-3 rounded-xl hover:bg-gray-800 transition-colors text-lg">
                Batal
            </button>
            <!-- In a real app this would be a form submission to a delete route -->
            <button type="button" onclick="closeDeleteUserModal()" class="flex-1 bg-[#C80000] text-white font-bold py-3 rounded-xl hover:bg-red-700 transition-colors text-lg">
                Hapus
            </button>
        </div>
    </div>
</div>

<script>
    // Edit Modal Functions
    function openEditUserModal(nama) {
        document.getElementById('editNama').value = nama;
        const modal = document.getElementById('editUserModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditUserModal() {
        const modal = document.getElementById('editUserModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Delete Modal Functions
    function openDeleteUserModal() {
        const modal = document.getElementById('deleteUserModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteUserModal() {
        const modal = document.getElementById('deleteUserModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>

@endsection
