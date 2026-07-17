@extends('layouts.user')

@section('content')

{{-- Alpine.js untuk interaktivitas halaman --}}
<div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 py-8 pb-20 relative" 
     x-data="{
        isEditing: false,           // mode edit profil (true/false)
        nama: '{{ $user->name }}',  // data nama dari database
        email: '{{ $user->email }}', // data email dari database
        showPassword: false,        // toggle tampilkan/sembunyikan password
        previewFoto: @js($user->foto ? asset('storage/' . $user->foto) : null), // preview foto dari storage
     }"
     x-init="">
    
    {{-- NOTIFIKASI SUKSES (Style seperti Reset Password Login) --}}
    @if(session('success'))
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity duration-300" x-data="{ show: true }" x-show="show" x-transition>
            <div class="bg-white rounded-[35px] w-full max-w-[380px] mx-4 px-8 py-10 text-center shadow-2xl relative" @click.away="show = false">
                
                <!-- Icon -->
                <div class="mx-auto mb-6 w-20 h-20 rounded-full bg-[#0CD939] flex items-center justify-center shadow-lg shadow-green-500/30">
                    <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                
                <!-- Text -->
                <h2 class="text-xl sm:text-2xl font-bold text-[#0CD939] tracking-wide uppercase">
                    {!! nl2br(e(str_replace(' berhasil diperbarui!', "\nBERHASIL!", strtoupper(session('success'))))) !!}
                </h2>
                
                <!-- Tombol Close (Opsional) -->
                <button @click="show = false" class="absolute top-4 right-5 text-gray-400 hover:text-gray-700 outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    @endif
    
    @if(session('error'))
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" x-data="{ show: true }" x-show="show" x-transition>
            <div class="bg-white rounded-3xl p-6 md:p-8 flex flex-col items-center justify-center shadow-2xl relative w-full max-w-sm mx-4" @click.away="show = false">
                <button @click="show = false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
                <div class="w-20 h-20 bg-[#CC0000] rounded-full flex items-center justify-center mb-5 shadow-[0_0_15px_rgba(204,0,0,0.4)]">
                    <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#CC0000] text-center tracking-wide mb-2">Gagal</h3>
                <div class="text-gray-600 text-center text-sm font-medium">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    @endif
    
    {{-- Tampilkan error validasi (kecuali untuk form reset password yang ditampilkan inline) --}}
    @if($errors->hasBag('profileUpdate') || $errors->hasBag('fotoUpdate') || ($errors->any() && !$errors->hasBag('passwordUpdate')))
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" x-data="{ show: true }" x-show="show" x-transition>
            <div class="bg-white rounded-3xl p-6 md:p-8 flex flex-col items-center justify-center shadow-2xl relative w-full max-w-sm mx-4" @click.away="show = false">
                <button @click="show = false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
                <div class="w-20 h-20 bg-[#CC0000] rounded-full flex items-center justify-center mb-5 shadow-[0_0_15px_rgba(204,0,0,0.4)]">
                    <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#CC0000] text-center tracking-wide mb-2">Validasi Gagal</h3>
                <div class="text-gray-600 text-center text-sm font-medium space-y-1">
                    @foreach($errors->getBags() as $bag => $errorBag)
                        @if($bag !== 'passwordUpdate')
                            @foreach($errorBag->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- BANNER --}}
    <div class="w-full h-48 md:h-72 overflow-hidden relative shadow-[0_10px_40px_rgba(0,0,0,0.3)] rounded-3xl">
        <img src="{{ asset('images/card1.png') }}" class="w-full h-full object-cover opacity-70" alt="Banner">
        <div class="absolute inset-0 bg-gradient-to-t from-[#050a24] via-[#050a24]/50 to-transparent"></div>
    </div>

    {{-- AREA PROFIL --}}
    <div class="w-full max-w-4xl mx-auto relative -mt-24 md:-mt-32">
        
        {{-- FOTO PROFIL --}}
        <div class="flex flex-col items-center">
            
            {{-- Form upload foto (tersembunyi, di luar form hapus) --}}
            <form id="fotoForm" action="{{ route('user.profile.foto') }}" method="POST" enctype="multipart/form-data" class="hidden">
                @csrf
                <input type="file" id="fotoInput" name="foto" accept="image/*" 
                       @change="
                           const file = $event.target.files[0];
                           if (file) {
                               // Preview foto
                               const reader = new FileReader();
                               reader.onload = (e) => {
                                   previewFoto = e.target.result;
                               };
                               reader.readAsDataURL(file);
                               // Auto submit form
                               document.getElementById('fotoForm').submit();
                           }
                       ">
            </form>

            <div class="relative w-40 h-40 md:w-64 md:h-64 group cursor-pointer">
                {{-- Lingkaran foto --}}
                    <div class="rounded-full border-[6px] border-white shadow-2xl overflow-hidden w-full h-full bg-[#2A304D] flex items-center justify-center relative">
                        {{-- Tampilkan preview atau icon default --}}
                        <template x-if="previewFoto">
                            <img :src="previewFoto" class="w-full h-full object-cover" alt="Foto Profil">
                        </template>
                        <template x-if="!previewFoto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-white/50" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </template>
                        
                        {{-- Overlay ganti foto (muncul saat hover) --}}
                        <label for="fotoInput" class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center backdrop-blur-sm cursor-pointer">
                            <svg class="w-8 h-8 text-white mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-white text-sm font-bold tracking-wider">Ubah Foto</span>
                        </label>
                    </div>
                    
                    {{-- Tombol hapus foto (muncul jika ada foto) --}}
                        <form action="{{ route('user.profile.foto.delete') }}" method="POST" class="absolute top-[85%] left-[85%] -translate-x-1/2 -translate-y-1/2 z-10">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Yakin ingin menghapus foto profil?')"
                                    title="Hapus Foto" 
                                    class="bg-[#CC0000] text-white rounded-full shadow-lg hover:scale-110 hover:bg-red-700 transition-all flex items-center justify-center w-8 h-8 md:w-10 md:h-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 md:w-5 md:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                </div>
        </div>
        
        {{-- JUDUL & TOMBOL EDIT --}}
        <div class="mt-12 flex flex-col md:flex-row justify-between items-center gap-6">
            <h2 class="text-2xl md:text-3xl font-bold text-white tracking-wide font-sans">Profil Saya</h2>
            
            {{-- Tombol aksi --}}
            <div class="flex gap-4">
                {{-- Tombol Edit (muncul saat tidak dalam mode edit) --}}
                <template x-if="!isEditing">
                    <button @click="isEditing = true" class="px-5 py-2 md:px-6 md:py-2.5 rounded-full font-bold transition-colors flex items-center gap-2 bg-[#FFD700] text-black hover:bg-yellow-400 text-sm md:text-base">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        Edit
                    </button>
                </template>
                
                {{-- Tombol Batal & Simpan (muncul saat mode edit) --}}
                <template x-if="isEditing">
                    <div class="flex gap-3">
                        <button @click="isEditing = false; nama = '{{ $user->name }}'; email = '{{ $user->email }}'" 
                                class="px-5 py-2 md:px-6 md:py-2.5 rounded-lg font-bold transition-colors bg-[#374151] text-white hover:bg-gray-600 text-sm md:text-base">
                            Batal
                        </button>
                        <button type="submit" form="profileForm" 
                                class="px-5 py-2 md:px-6 md:py-2.5 rounded-lg font-bold transition-colors bg-[#00E676] text-black hover:bg-green-400 text-sm md:text-base">
                            Simpan
                        </button>
                    </div>
                </template>
            </div>
        </div>

        {{-- FORM EDIT PROFIL --}}
        <form id="profileForm" action="{{ route('user.profile.update') }}" method="POST">
            @csrf
            @method('PATCH')
            
            <div class="mt-8 border border-[#525770] rounded-xl p-6 md:p-8 bg-[#333956] shadow-lg transition-all duration-300" 
                 :class="isEditing ? 'border-[#9CA3AF]' : ''">
                
                <div class="space-y-6">
                    {{-- Input Nama --}}
                    <div>
                        <label class="block text-white font-bold text-lg md:text-xl mb-2 tracking-wide">Nama</label>
                        <input type="text" 
                               name="name" 
                               x-model="nama" 
                               :disabled="!isEditing" 
                               class="w-full rounded-xl px-4 py-3 md:py-3.5 focus:outline-none transition-colors border"
                               :class="isEditing ? 'bg-[#676D88] border-white text-white focus:ring-1 focus:ring-white' : 'bg-[#676D88] border-[#A0A4B8] text-gray-200 cursor-not-allowed'">
                    </div>
                    {{-- Input Email --}}
                    <div>
                        <label class="block text-white font-bold text-lg md:text-xl mb-2 tracking-wide">Alamat Email</label>
                        <input type="email" 
                               name="email" 
                               x-model="email" 
                               :disabled="!isEditing" 
                               class="w-full rounded-xl px-4 py-3 md:py-3.5 focus:outline-none transition-colors border"
                               :class="isEditing ? 'bg-[#676D88] border-white text-white focus:ring-1 focus:ring-white' : 'bg-[#676D88] border-[#A0A4B8] text-gray-200 cursor-not-allowed'">
                    </div>
                </div>
            </div>
        </form>

        {{-- AREA KEAMANAN --}}
        <h2 class="text-2xl md:text-3xl font-bold text-white mt-14 mb-6 tracking-wide font-sans">Keamanan</h2>
        
        {{-- FORM RESET PASSWORD --}}
        <form action="{{ route('user.profile.password') }}" method="POST" class="border border-[#525770] rounded-xl p-6 md:p-8 bg-[#333956] shadow-lg transition-all duration-300">
            @csrf
            @method('PATCH')
                
                {{-- Password lama --}}
                <div class="relative mt-4">
                    <label class="block text-white font-bold text-lg md:text-xl mb-2 tracking-wide">Password Lama</label>
                    <div class="relative" x-data="{ showCurrentPassword: false }">
                        <input :type="showCurrentPassword ? 'text' : 'password'" 
                               name="current_password" 
                               placeholder="********" 
                               required
                               class="w-full bg-[#676D88] text-white border border-[#A0A4B8] rounded-xl px-4 py-3 md:py-3.5 focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition-colors pr-12">
                        
                        <div @click="showCurrentPassword = !showCurrentPassword" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-900 cursor-pointer hover:text-black transition-colors">
                            <svg x-show="!showCurrentPassword" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                            <svg x-show="showCurrentPassword" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.164 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                    @error('current_password', 'passwordUpdate')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password baru --}}
                <div class="relative mt-4">
                    <label class="block text-white font-bold text-lg md:text-xl mb-2 tracking-wide">Password Baru</label>
                    <div class="relative" x-data="{ showNewPassword: false }">
                        <input :type="showNewPassword ? 'text' : 'password'" 
                               name="password" 
                               placeholder="********" 
                               required
                               minlength="8"
                               class="w-full bg-[#676D88] text-white border border-[#A0A4B8] rounded-xl px-4 py-3 md:py-3.5 focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition-colors pr-12">
                        
                        <div @click="showNewPassword = !showNewPassword" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-900 cursor-pointer hover:text-black transition-colors">
                            <svg x-show="!showNewPassword" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                            <svg x-show="showNewPassword" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.164 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                    @error('password', 'passwordUpdate')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="relative mt-4">
                    <label class="block text-white font-bold text-lg md:text-xl mb-2 tracking-wide">Konfirmasi Password</label>
                    <div class="relative" x-data="{ showConfirmPassword: false }">
                        <input :type="showConfirmPassword ? 'text' : 'password'" 
                               name="password_confirmation" 
                               placeholder="********" 
                               required
                               minlength="8"
                               class="w-full bg-[#676D88] text-white border border-[#A0A4B8] rounded-xl px-4 py-3 md:py-3.5 focus:outline-none focus:border-white focus:ring-1 focus:ring-white transition-colors pr-12">
                        
                        <div @click="showConfirmPassword = !showConfirmPassword" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-900 cursor-pointer hover:text-black transition-colors">
                            <svg x-show="!showConfirmPassword" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                            <svg x-show="showConfirmPassword" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.164 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                {{-- Tombol reset password --}}
                <div class="flex justify-end mt-8">
                    <button type="submit" class="text-white px-5 py-2.5 rounded-lg font-bold transition-colors text-sm md:text-base bg-[#CC0000] hover:bg-red-700">
                        Reset Password
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection