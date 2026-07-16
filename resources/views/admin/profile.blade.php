@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-[#090F31] mb-2" style="font-family: 'Inter', sans-serif;">
                Profil Admin
            </h1>
            <p class="text-gray-600 text-sm">
                Kelola informasi akun dan pengaturan keamanan Anda
            </p>
        </div>
    </div>

    <!-- Notifikasi -->
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 rounded-xl p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-red-700">
            {{ session('error') }}
        </div>
    @endif
    
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-red-700">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- Informasi Profil Card -->
    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
        <div class="p-6 border-b border-gray-100 flex items-center gap-4">
            <!-- Avatar Placeholder -->
            <div class="w-16 h-16 rounded-full bg-[#090F31] flex items-center justify-center text-[#FFCC00] text-2xl font-bold shadow-inner">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div>
                <h2 class="text-xl font-bold text-[#090F31]">Informasi Dasar</h2>
                <p class="text-sm text-gray-500">Perbarui nama dan alamat email admin.</p>
            </div>
        </div>
        
        <div class="p-6 md:p-8">
            <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')
                <!-- Nama -->
                <div>
                    <label class="block text-sm font-bold text-[#090F31] mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm text-[#090F31] focus:outline-none focus:border-[#090F31] focus:ring-1 focus:ring-[#090F31] transition-colors">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-bold text-[#090F31] mb-2">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm text-[#090F31] focus:outline-none focus:border-[#090F31] focus:ring-1 focus:ring-[#090F31] transition-colors">
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-[#090F31] text-white font-bold px-8 py-3 rounded-xl hover:bg-gray-800 transition-colors">
                        Simpan Profil
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Keamanan Card -->
    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-bold text-[#090F31]">Ubah Password</h2>
            <p class="text-sm text-gray-500 mt-1">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.</p>
        </div>
        
        <div class="p-6 md:p-8">
            <form action="{{ route('admin.profile.password') }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')
                <!-- Password Baru -->
                <div class="relative" x-data="{ show: false }">
                    <label class="block text-sm font-bold text-[#090F31] mb-2">Password Baru</label>
                    <input :type="show ? 'text' : 'password'" name="password" placeholder="Masukkan password baru" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 pr-12 text-sm text-[#090F31] focus:outline-none focus:border-[#090F31] focus:ring-1 focus:ring-[#090F31] transition-colors">
                    <div @click="show = !show" class="absolute right-4 top-[2.4rem] text-gray-400 cursor-pointer hover:text-gray-600 transition-colors">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                        <svg x-show="show" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.164 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>

                <!-- Konfirmasi Password -->
                <div class="relative" x-data="{ show: false }">
                    <label class="block text-sm font-bold text-[#090F31] mb-2">Verifikasi Password</label>
                    <input :type="show ? 'text' : 'password'" name="password_confirmation" placeholder="Ulangi password baru" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 pr-12 text-sm text-[#090F31] focus:outline-none focus:border-[#090F31] focus:ring-1 focus:ring-[#090F31] transition-colors">
                    <div @click="show = !show" class="absolute right-4 top-[2.4rem] text-gray-400 cursor-pointer hover:text-gray-600 transition-colors">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                        <svg x-show="show" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.164 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-[#090F31] text-white font-bold px-8 py-3 rounded-xl hover:bg-gray-800 transition-colors">
                        Perbarui Password
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection