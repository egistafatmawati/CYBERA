@extends('layouts.admin')

@section('content')

<div class="max-w-6xl mx-auto space-y-6">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-[#090F31] mb-2" style="font-family: 'Inter', sans-serif;">
            Manajemen Pengguna
        </h1>
        <p class="text-gray-700 text-base md:text-lg">
            <span class="font-extrabold text-[#090F31]">{{ $totalTerdaftar }}</span> Terdaftar, <span class="font-extrabold text-[#FFCC00]">{{ $totalAktif }}</span> Aktif
        </p>
    </div>

    <!-- Notifikasi -->
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 rounded-xl p-4 text-green-700 mb-6">
            {{ session('success') }}
        </div>
    @endif
    
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-red-700 mb-6">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- Table Card -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <!-- Table Head -->
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-sm text-[#090F31] font-bold uppercase tracking-wider">
                        <th class="px-6 py-5 text-center">Pengguna</th>
                        <th class="px-6 py-5 text-center">Role</th>
                        <th class="px-6 py-5 text-center">Kuis</th>
                        <th class="px-6 py-5 text-center">Rata-rata</th>
                        <th class="px-6 py-5 text-center">Bergabung</th>
                        <th class="px-6 py-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody class="text-sm">
                    @forelse($penggunas as $p)
                    @php
                        // Menghitung inisial dari nama
                        $words = explode(' ', $p->name);
                        $inisial = strtoupper(substr($words[0], 0, 1));
                        if(count($words) > 1) {
                            $inisial .= strtoupper(substr($words[1], 0, 1));
                        }
                        
                        $kuisCount = $p->quizResults->count();
                        $rataRata = $kuisCount > 0 ? round($p->quizResults->avg('skor')) : 0;
                    @endphp
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                        <!-- Pengguna -->
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                @if($p->foto)
                                    <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->name }}" class="w-11 h-11 rounded-full object-cover shrink-0">
                                @else
                                    <div class="w-11 h-11 rounded-full bg-[#FFCC00]/10 flex items-center justify-center shrink-0">
                                        <span class="text-[#FFB300] font-bold text-[13px]">{{ $inisial }}</span>
                                    </div>
                                @endif
                                <div>
                                    <div class="font-bold text-[14px] text-[#090F31]">{{ $p->name }}</div>
                                    <div class="text-[12px] text-gray-400 mt-0.5">{{ $p->email }}</div>
                                </div>
                            </div>
                        </td>

                        <!-- Role -->
                        <td class="px-6 py-5 text-center align-middle">
                            <span class="inline-flex items-center justify-center rounded-full bg-cyan-50 px-3 py-1 text-[12px] font-bold text-cyan-500">
                                Peserta
                            </span>
                        </td>

                        <!-- Kuis -->
                        <td class="px-6 py-5 text-center text-gray-600 text-[13px] font-medium align-middle">
                            {{ $kuisCount }} selesai
                        </td>

                        <!-- Rata-rata -->
                        <td class="px-6 py-5 text-center font-bold text-[14px] align-middle">
                            @if($rataRata < 60)
                                <span class="text-[#CC0000]">{{ $rataRata }}/100</span>
                            @elseif($rataRata < 80)
                                <span class="text-[#FFCC00]">{{ $rataRata }}/100</span>
                            @else
                                <span class="text-[#00E676]">{{ $rataRata }}/100</span>
                            @endif
                        </td>

                        <!-- Bergabung -->
                        <td class="px-6 py-5 text-center text-gray-500 text-[12px] align-middle">
                            {{ $p->created_at->translatedFormat('d F Y') }}
                        </td>

                        <!-- Aksi -->
                        <td class="px-6 py-5 align-middle">
                            <div class="flex items-center justify-center gap-4">
                                <button onclick="openEditUserModal('{{ $p->id }}', '{{ addslashes($p->name) }}', '{{ addslashes($p->email) }}')" class="text-green-500 hover:text-green-600 transition-colors" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </button>
                                <button onclick="openDeleteUserModal('{{ $p->id }}')" class="text-red-500 hover:text-red-600 transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada pengguna terdaftar.</td>
                    </tr>
                    @endforelse
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
        <form id="editUserForm" action="" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')
            
            <!-- Nama -->
            <div>
                <label class="block text-sm font-bold mb-2">Nama</label>
                <input type="text" name="name" id="editNama" placeholder="Masukkan nama" required class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-bold mb-2">Email</label>
                <div class="relative">
                    <input type="email" name="email" id="editEmail" placeholder="Masukkan email" required class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                    <!-- Eye Icon (from user's design image) -->
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
            <!-- Form untuk hapus -->
            <form id="deleteUserForm" action="" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full h-full bg-[#C80000] text-white font-bold py-3 rounded-xl hover:bg-red-700 transition-colors text-lg">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Edit Modal Functions
    function openEditUserModal(id, nama, email) {
        document.getElementById('editNama').value = nama;
        document.getElementById('editEmail').value = email;
        
        // Update URL form
        const form = document.getElementById('editUserForm');
        form.action = `/admin/pengguna/${id}`;

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
    function openDeleteUserModal(id) {
        // Update URL form
        const form = document.getElementById('deleteUserForm');
        form.action = `/admin/pengguna/${id}`;

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
