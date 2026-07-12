@extends('layouts.user')

@section('content')

<div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 py-8 pb-20 relative" x-data="{
    isEditing: false,
    nama: 'Budi',
    email: 'Budi@gmail.com',
    showPassword: false
}">
    <!-- Banner -->
    <div class="w-full h-48 md:h-72 overflow-hidden relative shadow-[0_10px_40px_rgba(0,0,0,0.3)] rounded-3xl">
        <img src="{{ asset('images/card1.png') }}" class="w-full h-full object-cover opacity-70" alt="Banner">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-[#050a24] via-[#050a24]/50 to-transparent"></div>
    </div>

    <!-- Profile Info -->
    <div class="w-full max-w-4xl mx-auto relative -mt-24 md:-mt-32">
        
        <!-- Avatar -->
        <div class="flex flex-col items-center">
            <div class="relative w-40 h-40 md:w-56 md:h-56 group cursor-pointer">
                <!-- Foto Profil -->
                <div class="rounded-full border-[4px] border-white/10 shadow-2xl overflow-hidden w-full h-full bg-[#2A304D] flex items-center justify-center relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-white/50" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <!-- Overlay Ubah Foto (Muncul saat Hover) -->
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-white text-sm font-bold tracking-wider">Ubah Foto</span>
                    </div>
                </div>
                <!-- Tombol Hapus Avatar -->
                <button title="Hapus Foto" class="absolute bg-[#CC0000] text-white rounded-full shadow-lg hover:scale-110 hover:bg-red-700 transition-all border-[3px] border-[#0b112c] flex items-center justify-center bottom-2 right-2 md:bottom-4 md:right-4 w-11 h-11 md:w-12 md:h-12 z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Title and Buttons -->
        <div class="mt-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <h2 class="text-3xl font-bold text-white tracking-wide" style="font-family: 'Audiowide', sans-serif;">Profil Saya</h2>
            
            <!-- Button Group -->
            <div class="flex gap-4">
                <template x-if="!isEditing">
                    <button @click="isEditing = true" class="px-6 py-2.5 rounded-xl font-bold shadow-[0_0_15px_rgba(255,204,0,0.3)] transition-colors flex items-center gap-2 bg-[#FFCC00] text-black hover:bg-yellow-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        Edit Profil
                    </button>
                </template>
                
                <template x-if="isEditing">
                    <div class="flex gap-3">
                        <button @click="isEditing = false; nama = 'Budi'; email = 'Budi@gmail.com'" class="px-6 py-2.5 rounded-xl font-bold transition-colors bg-gray-600 text-white hover:bg-gray-500">
                            Batal
                        </button>
                        <button @click="isEditing = false" class="px-6 py-2.5 rounded-xl font-bold shadow-[0_0_15px_rgba(0,230,118,0.3)] transition-colors bg-[#00E676] text-black hover:bg-green-400">
                            Simpan
                        </button>
                    </div>
                </template>
            </div>
        </div>

        <!-- Profil Saya Card -->
        <div class="mt-8 border border-gray-600/50 rounded-2xl p-8 bg-[#131A38]/60 shadow-xl transition-all duration-300" :class="isEditing ? 'border-[#FFCC00]/80 ring-1 ring-[#FFCC00]/30' : ''">
            <div class="space-y-6">
                <div>
                    <label class="block text-white font-bold text-sm mb-2 tracking-wide">Nama Lengkap</label>
                    <input type="text" x-model="nama" :disabled="!isEditing" 
                        class="w-full rounded-xl px-4 py-3.5 focus:outline-none transition-colors border"
                        :class="isEditing ? 'bg-[#525770] border-[#FFCC00] text-white focus:ring-1 focus:ring-[#FFCC00]' : 'bg-[#525770]/60 border-transparent text-gray-300 cursor-not-allowed'">
                </div>
                <div>
                    <label class="block text-white font-bold text-sm mb-2 tracking-wide">Alamat Email</label>
                    <input type="email" x-model="email" :disabled="!isEditing" 
                        class="w-full rounded-xl px-4 py-3.5 focus:outline-none transition-colors border"
                        :class="isEditing ? 'bg-[#525770] border-[#FFCC00] text-white focus:ring-1 focus:ring-[#FFCC00]' : 'bg-[#525770]/60 border-transparent text-gray-300 cursor-not-allowed'">
                </div>
            </div>
        </div>

        <h2 class="text-2xl font-bold text-white mt-14 mb-6 tracking-wide" style="font-family: 'Audiowide', sans-serif;">Keamanan</h2>
        
        <!-- Keamanan Card -->
        <div class="border border-gray-600/50 rounded-2xl p-8 bg-[#131A38]/60 shadow-xl">
            <div class="space-y-6">
                <div class="relative">
                    <label class="block text-white font-bold text-sm mb-2 tracking-wide">Password Saat Ini</label>
                    <input :type="showPassword ? 'text' : 'password'" value="12345678" disabled 
                        class="w-full bg-[#525770]/60 text-gray-300 border border-transparent rounded-xl px-4 py-3.5 focus:outline-none cursor-not-allowed pr-12">

                    
                    <!-- Eye Icon Toggle -->
                    <div @click="showPassword = !showPassword" class="absolute right-4 top-[2.4rem] text-gray-400 cursor-pointer hover:text-white transition-colors">
                        <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                        <svg x-show="showPassword" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.164 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>
                
                <div class="flex justify-end mt-8">
                    <button type="button" onclick="document.getElementById('forgotPasswordModal').classList.remove('hidden')" 
                        class="text-white px-8 py-3 rounded-xl font-bold shadow-[0_0_15px_rgba(204,0,0,0.3)] transition-colors text-sm border border-red-500/50 bg-[#CC0000] hover:bg-red-700">
                        Reset Password
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.forgot-password')

@endsection
