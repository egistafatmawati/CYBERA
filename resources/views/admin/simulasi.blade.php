@extends('layouts.admin')

@section('content')

<div class="max-w-6xl mx-auto space-y-6">

    <!-- Header -->
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-[#090F31] mb-2" style="font-family: 'Inter', sans-serif;">
                Manajemen Simulasi
            </h1>
            <p class="text-gray-700 text-base md:text-lg">
                <span class="font-extrabold text-[#090F31]">{{ $simulasis->count() }}</span> Materi pembelajaran
            </p>
        </div>
    </div>
    
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

        <!-- Table Card -->
        <div class="bg-white border border-gray-200 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <!-- Table Head -->
                <thead>
                    <tr class="bg-[#F4F4F4] border-b border-gray-200 text-sm text-black font-bold uppercase tracking-wider">
                        <th class="px-6 py-5 text-center w-1/6">Simulasi</th>
                        <th class="px-6 py-5 text-center w-1/6">Deskripsi</th>
                        <th class="px-6 py-5 text-center w-1/6">Skenario</th>
                        <th class="px-6 py-5 text-center w-1/6">Aksi</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody class="text-sm">
                    @forelse($simulasis as $s)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors bg-white">
                        <!-- Judul -->
                        <td class="pl-12 pr-6 py-5 text-left font-medium text-[#090F31]">
                            {{ $s->judul }}
                        </td>

                        <!-- Deskripsi -->
                        <td class="px-6 py-5 text-gray-600 text-[13px] leading-relaxed text-center">
                            <div class="max-w-[320px] mx-auto text-left break-words">
                                {{ $s->deskripsi }}
                            </div>
                        </td>

                        <!-- Skenario -->
                        <td class="px-6 py-5 text-center">
                            <span class="px-3 py-1 bg-cyan-50 text-cyan-500 text-[11px] font-bold rounded-full">
                                {{ is_array($s->skenario) ? count($s->skenario) : 0 }} skenario
                            </span>
                        </td>

                        <!-- Aksi -->
                        <td class="px-6 py-5 text-center align-middle">
                            <div class="flex items-center justify-center gap-2">
                                <button
                                    onclick='openSimulasiModal(@json($s))'
                                    class="inline-flex items-center justify-center gap-1.5 px-4 py-1.5 rounded-md border border-[#00E676] text-[#00E676] hover:bg-[#00E676] hover:text-white transition-colors font-medium text-xs">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                        </path>
                                    </svg>
                                    Edit
                                </button>
                            </div>
                        </td>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                            Belum ada data simulasi.
                        </td>
                    </tr>
                    @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Simulasi Modal -->
<div id="editSimulasiModal" class="fixed inset-0 z-[100] items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity p-4"
    x-data="{
        isOpen: false,
        isEdit: false,
        id: null,
        materi_id: '',
        judul: '',
        deskripsi: '',
        tips: [''],
        tipe: '4-opsi',
        skenarios: [],
        
        initModal(data) {
            if (data) {
                this.isEdit = true;
                this.id = data.id;
                this.materi_id = data.materi_id;
                this.judul = data.judul;
                this.deskripsi = data.deskripsi;
                this.tips = typeof data.tips === 'string' ? JSON.parse(data.tips) : (data.tips || ['']);
                if (!Array.isArray(this.tips) || this.tips.length === 0) this.tips = [''];
                this.skenarios = typeof data.skenario === 'string' ? JSON.parse(data.skenario) : data.skenario;
                if (!Array.isArray(this.skenarios)) this.skenarios = [];
                
                this.tipe = '4-opsi';
                if (this.skenarios.length > 0) {
                    if (this.skenarios[0].percakapan !== undefined) {
                        this.tipe = 'percakapan';
                    } else if (this.skenarios[0].opsi && this.skenarios[0].opsi.length === 2) {
                        this.tipe = '2-opsi';
                    }
                }
            } else {
                this.isEdit = false;
                this.id = null;
                this.materi_id = '';
                this.judul = '';
                this.deskripsi = '';
                this.tips = [''];
                this.tipe = '4-opsi';
                this.skenarios = [];
            }
            this.isOpen = true;
        },
        
        closeModal() {
            this.isOpen = false;
        },

        addTip() {
            this.tips.push('');
        },

        removeTip(index) {
            this.tips.splice(index, 1);
        },

        addSkenario() {
            let newSkenario = {
                skenario_teks: '',
                pertanyaan: '',
                jawaban_benar: 0,
                penjelasan: ''
            };
            
            if (this.tipe === 'percakapan') {
                newSkenario.percakapan = [{ pengirim: '', pesan: '' }];
                newSkenario.opsi = ['', '', '', ''];
            } else if (this.tipe === '2-opsi') {
                newSkenario.opsi = ['Ya, Ini Phishing', 'Tidak, Ini Aman'];
            } else {
                newSkenario.opsi = ['', '', '', ''];
            }
            
            this.skenarios.push(newSkenario);
        },

        removeSkenario(sIndex) {
            this.skenarios.splice(sIndex, 1);
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
    @open-simulasi-modal.window="initModal($event.detail.data)">
    
    <!-- Modal Container -->
    <div class="bg-[#0b112c] text-white rounded-2xl w-full max-w-4xl flex flex-col max-h-[90vh] shadow-2xl relative border border-gray-700">
        
        <!-- Header: Keluar -->
        <div class="p-5 md:p-6 border-b border-gray-800 flex justify-between items-center">
            <h2 class="text-xl font-bold" x-text="isEdit ? 'Edit Simulasi' "></h2>
            <button type="button" @click="closeModal()" class="flex items-center gap-2 text-[#FFCC00] font-bold hover:text-yellow-400 transition-colors text-sm md:text-base w-max">
                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                Tutup
            </button>
        </div>

        <!-- Form Content (Scrollable) -->
        <div class="flex-1 p-5 md:p-6 overflow-y-auto custom-scrollbar">
            <form id="simulasiForm" :action="isEdit ? `/admin/simulasi/${id}` : `{{ route('admin.simulasi.store') }}`" method="POST" class="space-y-6">
                @csrf
                <template x-if="isEdit">
                    <input type="hidden" name="_method" value="PUT">
                </template>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Judul Simulasi -->
                    <div>
                        <label class="block text-sm font-bold mb-2">Judul Simulasi</label>
                        <input type="text" x-model="judul" name="judul" required class="w-full bg-[#050a24] border border-gray-700 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                    </div>

                    <!-- Materi -->
                    <div>
                        <label class="block text-sm font-bold mb-2">Materi Terkait</label>
                        <select x-model="materi_id" name="materi_id" required class="w-full bg-[#050a24] border border-gray-700 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                            <option value="">Pilih Materi</option>
                            @foreach($materis as $m)
                                <option value="{{ $m->id }}">{{ $m->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-bold mb-2">Deskripsi</label>
                    <textarea x-model="deskripsi" name="deskripsi" rows="3" required class="w-full bg-[#050a24] border border-gray-700 rounded-lg px-4 py-3 text-sm text-gray-300 focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors resize-none"></textarea>
                </div>

                <!-- Tips -->
                <div class="border border-gray-700 rounded-xl p-4 md:p-6 bg-white/5 relative mb-4">
                    <div class="flex justify-between items-center mb-4">
                        <label class="block text-sm font-bold text-[#FFCC00]">Tips Simulasi</label>
                        <button type="button" @click="addTip()" class="bg-[#FFCC00] text-black text-xs font-bold px-3 py-1.5 rounded hover:bg-yellow-500 shadow-sm">
                            + Tambah Tips
                        </button>
                    </div>
                    
                    <div class="space-y-3">
                        <template x-for="(tip, tIndex) in tips" :key="tIndex">
                            <div class="flex gap-2">
                                <input type="text" x-model="tips[tIndex]" :name="`tips[]`" placeholder="Masukkan tips simulasi..." required class="flex-1 bg-[#050a24] border border-gray-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                                <button type="button" @click="removeTip(tIndex)" x-show="tips.length > 1" class="px-3 py-2 bg-red-500/20 text-red-400 rounded-lg border border-red-500/30 hover:bg-red-500 hover:text-white transition-colors" title="Hapus Tips">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Tips -->
                <div class="border border-gray-700 rounded-xl p-4 md:p-6 bg-white/5 relative mb-4">
                    <div class="flex justify-between items-center mb-4">
                        <label class="block text-sm font-bold text-[#FFCC00]">Tips Simulasi</label>
                        <button type="button" @click="addTip()" class="bg-[#FFCC00] text-black text-xs font-bold px-3 py-1.5 rounded hover:bg-yellow-500 shadow-sm">
                            + Tambah Tips
                        </button>
                    </div>
                    
                    <div class="space-y-3">
                        <template x-for="(tip, tIndex) in tips" :key="tIndex">
                            <div class="flex gap-2">
                                <input type="text" x-model="tips[tIndex]" :name="`tips[]`" placeholder="Masukkan tips simulasi..." required class="flex-1 bg-[#050a24] border border-gray-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                                <button type="button" @click="removeTip(tIndex)" x-show="tips.length > 1" class="px-3 py-2 bg-red-500/20 text-red-400 rounded-lg border border-red-500/30 hover:bg-red-500 hover:text-white transition-colors" title="Hapus Tips">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="pt-4 pb-2 flex justify-between items-center border-t border-gray-800">
                    <h3 class="text-white font-bold text-lg" x-text="`Skenario (${skenarios.length})`"></h3>
                    <div class="flex items-center gap-3">
                        <select x-model="tipe" class="bg-[#050a24] border border-gray-700 rounded-lg px-3 py-2 text-xs text-white">
                            <option value="4-opsi">Pilihan Ganda (4 Opsi)</option>
                            <option value="2-opsi">Benar/Salah (2 Opsi)</option>
                            <option value="percakapan">Skenario Percakapan</option>
                        </select>
                        <button type="button" @click="addSkenario()" class="bg-[#FFCC00] text-black text-xs font-bold px-4 py-2 rounded-lg hover:bg-yellow-500 shadow-md">
                            + Tambah Skenario
                        </button>
                    </div>
                </div>

                <!-- Skenarios Loop -->
                <template x-for="(skenario, sIndex) in skenarios" :key="sIndex">
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-3">
                            <h4 class="text-[#FFCC00] font-bold text-sm" x-text="`Skenario ${sIndex + 1}`"></h4>
                            <button type="button" @click="removeSkenario(sIndex)" class="text-red-400 hover:text-red-500 text-xs font-bold flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Hapus
                            </button>
                        </div>
                        <div class="border border-gray-700 rounded-xl p-4 md:p-6 bg-white/5 relative">
                            
                            <!-- Skenario Teks -->
                            <div class="mb-5">
                                <label class="block text-sm font-bold mb-2">Teks Skenario</label>
                                <textarea x-model="skenario.skenario_teks" :name="`skenario[${sIndex}][skenario_teks]`" rows="4" required class="w-full bg-[#050a24] border border-gray-700 rounded-lg px-4 py-3 text-sm text-gray-300 focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors resize-none"></textarea>
                            </div>

                            <!-- Percakapan (Only for Social Engineering) -->
                            <template x-if="skenario.percakapan !== undefined">
                                <div class="mb-5">
                                    <div class="flex justify-between items-center mb-3">
                                        <label class="block text-sm font-bold text-[#FFCC00]">Pesan/Percakapan</label>
                                        <button type="button" @click="addPercakapan(sIndex)" class="bg-[#FFCC00] text-black text-[10px] md:text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1 hover:bg-yellow-500 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                                            Tambah Pesan
                                        </button>
                                    </div>
                                    <div class="space-y-4">
                                        <template x-for="(bubble, pIndex) in skenario.percakapan" :key="pIndex">
                                            <div class="relative">
                                                <div class="border border-gray-700 rounded-lg bg-[#050a24] p-3 flex flex-col gap-2">
                                                    <div class="flex justify-between items-center">
                                                        <input type="text" x-model="bubble.pengirim" :name="`skenario[${sIndex}][percakapan][${pIndex}][pengirim]`" placeholder="Pengirim (ex: Anda / Penipu)" required class="bg-transparent border-none text-sm text-[#FFCC00] font-bold focus:outline-none focus:ring-0 w-full p-0">
                                                        <button type="button" @click="removePercakapan(sIndex, pIndex)" class="text-gray-500 hover:text-red-500 transition-colors">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                        </button>
                                                    </div>
                                                    <textarea x-model="bubble.pesan" :name="`skenario[${sIndex}][percakapan][${pIndex}][pesan]`" rows="2" placeholder="Isi pesan..." required class="bg-transparent border-none text-sm text-gray-300 focus:outline-none focus:ring-0 w-full p-0 resize-none"></textarea>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </template>

                            <!-- Pertanyaan -->
                            <div class="mb-5">
                                <label class="block text-sm font-bold mb-2">Pertanyaan</label>
                                <input type="text" x-model="skenario.pertanyaan" :name="`skenario[${sIndex}][pertanyaan]`" required class="w-full bg-[#050a24] border border-gray-700 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                            </div>

                            <!-- Opsi Jawaban -->
                            <div class="mb-5">
                                <label class="block text-sm font-bold mb-2">Opsi Jawaban <span class="text-[10px] font-normal text-gray-400 ml-1">(pilih bulatan untuk menandai jawaban benar)</span></label>
                                <div class="space-y-3">
                                    <template x-for="(opt, oIndex) in skenario.opsi" :key="oIndex">
                                        <div class="flex items-center gap-3">
                                            <!-- Radio for correct answer -->
                                            <div class="relative flex items-center justify-center w-5 h-5 flex-shrink-0">
                                                <input type="radio" :name="`skenario[${sIndex}][jawaban_benar]`" :value="oIndex" x-model="skenario.jawaban_benar" required class="peer appearance-none w-5 h-5 border border-gray-500 rounded-full checked:border-[#FFCC00] cursor-pointer transition-colors">
                                                <div class="absolute w-2.5 h-2.5 bg-[#FFCC00] rounded-full hidden peer-checked:block pointer-events-none"></div>
                                            </div>
                                            <!-- Option Text -->
                                            <input type="text" x-model="skenario.opsi[oIndex]" :name="`skenario[${sIndex}][opsi][${oIndex}]`" required class="flex-1 bg-[#050a24] border border-gray-700 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors">
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Penjelasan Jawaban -->
                            <div>
                                <label class="block text-sm font-bold mb-2">Penjelasan Jawaban</label>
                                <textarea x-model="skenario.penjelasan" :name="`skenario[${sIndex}][penjelasan]`" rows="3" required class="w-full bg-[#050a24] border border-gray-700 rounded-lg px-4 py-3 text-sm text-gray-300 focus:outline-none focus:border-[#FFCC00] focus:ring-1 focus:ring-[#FFCC00] transition-colors resize-none"></textarea>
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
    function openSimulasiModal(data = null) {
        window.dispatchEvent(new CustomEvent('open-simulasi-modal', {
            detail: { data: data }
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
