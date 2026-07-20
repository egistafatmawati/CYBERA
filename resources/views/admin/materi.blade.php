@extends('layouts.admin')

@section('content')

<div class="max-w-6xl mx-auto space-y-6">

    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-[#090F31] mb-2" style="font-family: 'Inter', sans-serif;">
                Manajemen Materi
            </h1>
            <p class="text-gray-700 text-base md:text-lg">
                <span class="font-extrabold text-[#090F31]">{{ $materis->count() }}</span> Materi pembelajaran
            </p>
        </div>
    </div>

    <!-- Flash message -->
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
        {{ session('success') }}
    </div>
    @endif

    <!-- Table Card -->
    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <!-- Table Head -->
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-sm text-[#090F31] font-bold uppercase tracking-wider">
                        <th class="px-6 py-5 text-center w-1/6">Materi</th>
                        <th class="px-6 py-5 text-center w-1/6">Deskripsi</th>
                        <th class="px-6 py-5 text-center w-1/6">Aksi</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody class="text-sm">
                    @forelse($materis as $m)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <!-- Judul -->
                        <td class="px-6 py-5 text-left font-medium text-[#090F31]">
                            {{ $m->judul }}
                        </td>

                        <!-- Deskripsi -->
                        <td class="px-6 py-5 text-gray-600 text-[13px] leading-relaxed text-center pr-12">
                            <div class="max-w-[330px] mx-auto text-left break-words">
                                {{ $m->deskripsi }}
                            </div>
                        </td>

                        <!-- Aksi -->
                        <td class="px-6 py-5 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <!-- Tombol Edit -->
                                <button onclick='openEditMateriModal(@json($m))'
                                    class="inline-flex items-center justify-center gap-1.5 px-4 py-1.5 rounded-md border border-[#00E676] text-[#00E676] hover:bg-[#00E676] hover:text-white transition-colors font-medium text-xs">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                    Edit
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ===== MODAL TAMBAH MATERI ===== -->
<div id="addMateriModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity p-4">
    <div class="bg-[#0b112c] text-white rounded-2xl w-full max-w-3xl flex flex-col max-h-[90vh] shadow-2xl relative">
        
        <!-- Header -->
        <div class="p-6 pb-2">
            <button type="button" onclick="closeAddMateriModal()" class="flex items-center gap-2 text-[#FFCC00] font-bold hover:text-yellow-400 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Keluar
            </button>
        </div>

        <div class="p-6 pt-2 overflow-y-auto custom-scrollbar">
            <form action="{{ route('admin.materi.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Judul Materi -->
                <div>
                    <label class="block text-sm font-bold mb-2">Judul Materi</label>
                    <input type="text" name="judul" required class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="2" required class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors resize-none"></textarea>
                </div>

                <!-- Isi Materi -->
                <div>
                    <div class="flex items-baseline gap-2 mb-2">
                        <label class="block text-sm font-bold">Isi Materi</label>
                        <span class="text-xs text-gray-500">(gunakan tag HTML seperti &lt;section&gt;, &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;)</span>
                    </div>
                    <textarea name="isi" rows="12" required class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors resize-none leading-relaxed"></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-4">
                    <button type="button" onclick="closeAddMateriModal()" class="flex-1 bg-white text-black font-bold py-3.5 rounded-xl hover:bg-gray-200 transition-colors">
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

<!-- ===== MODAL EDIT MATERI ===== -->
<div id="editMateriModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity p-4">
    <div class="bg-[#0b112c] text-white rounded-2xl w-full max-w-3xl flex flex-col max-h-[90vh] shadow-2xl relative">
        
        <!-- Header -->
        <div class="p-6 pb-2">
            <button type="button" onclick="closeEditMateriModal()" class="flex items-center gap-2 text-[#FFCC00] font-bold hover:text-yellow-400 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Keluar
            </button>
        </div>

        <div class="p-6 pt-2 overflow-y-auto custom-scrollbar">
            <h2 class="text-xl font-bold mb-6">Edit Materi</h2>
            <form id="editMateriForm" action="" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Judul Materi -->
                <div>
                    <label class="block text-sm font-bold mb-2">Judul Materi</label>
                    <input type="text" id="editJudul" name="judul" required class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-bold mb-2">Deskripsi</label>
                    <textarea id="editDeskripsi" name="deskripsi" rows="2" required class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors resize-none"></textarea>
                </div>

                <!-- Isi Materi -->
                <div>
                    <div class="flex items-baseline gap-2 mb-2">
                        <label class="block text-sm font-bold">Isi Materi</label>
                        <span class="text-xs text-gray-500">(gunakan tag HTML seperti &lt;section&gt;, &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;)</span>
                    </div>
                    <textarea id="editIsi" name="isi" rows="12" required class="w-full bg-[#050a24] border border-gray-600 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors resize-none leading-relaxed"></textarea>
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
    // === MODAL ADD ===
    function openAddMateriModal() {
        const modal = document.getElementById('addMateriModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
    function closeAddMateriModal() {
        const modal = document.getElementById('addMateriModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // === MODAL EDIT ===
    function openEditMateriModal(materi) {
        document.getElementById('editJudul').value = materi.judul;
        document.getElementById('editDeskripsi').value = materi.deskripsi;
        document.getElementById('editIsi').value = materi.isi;

        // Set form action ke route update yang benar
        const form = document.getElementById('editMateriForm');
        form.action = `/admin/materi/${materi.id}`;

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
