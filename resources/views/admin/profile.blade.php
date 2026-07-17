@extends('layouts.admin')

@section('content')

<div class="max-w-6xl mx-auto space-y-6">
    
    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-[#090F31] mb-2" style="font-family: 'Inter', sans-serif;">
                Profil Admin
            </h1>
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
    <div class="bg-[#F4F4F4] rounded-xl border border-gray-300 overflow-hidden shadow-sm">
        <div class="p-6 md:p-8">
            <div class="flex items-center gap-4 mb-6">
                <!-- Foto Placeholder -->
                <div class="w-16 h-16 rounded-full bg-[#090F31] flex items-center justify-center text-[#FFCC00] text-2xl font-bold shadow-inner">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-xl font-bold text-[#090F31]">Informasi Dasar</h2>
                    <p class="text-sm text-gray-500">Perbarui nama dan alamat email admin.</p>
                </div>
            </div>

            <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')
                <!-- Nama -->
                <div>
                    <label class="block text-base font-bold text-[#090F31] mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name ?? 'Administrator') }}" class="w-full bg-transparent border border-gray-300 rounded-lg px-4 py-3 text-sm text-[#090F31] focus:outline-none focus:border-[#090F31] focus:ring-1 focus:ring-[#090F31] transition-colors">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-base font-bold text-[#090F31] mb-2">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email ?? 'AdminCybera@gmail.com') }}" class="w-full bg-transparent border border-gray-300 rounded-lg px-4 py-3 text-sm text-[#090F31] focus:outline-none focus:border-[#090F31] focus:ring-1 focus:ring-[#090F31] transition-colors">
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-[#090F31] text-white font-bold px-6 py-2.5 rounded-lg hover:bg-gray-800 transition-colors">
                        Simpan Profile
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Keamanan Card -->
    <div class="bg-[#F4F4F4] rounded-xl border border-gray-300 overflow-hidden shadow-sm mt-8">
        <div class="p-6 md:p-8">
            <div class="mb-6">
                <h2 class="text-xl font-bold text-[#090F31]">Ubah Password</h2>
                <p class="text-sm text-[#090F31] mt-1">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.</p>
            </div>
            
            <form action="{{ route('admin.profile.password') }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')
                <!-- Password Baru -->
                <div>
                    <label class="block text-base font-bold text-[#090F31] mb-2">Password Baru</label>
                    <input type="password" name="password" placeholder="Masukkan password baru" class="w-full bg-transparent border border-gray-300 rounded-lg px-4 py-3 text-sm text-[#090F31] focus:outline-none focus:border-[#090F31] focus:ring-1 focus:ring-[#090F31] transition-colors">
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label class="block text-base font-bold text-[#090F31] mb-2">Verifikasi Password</label>
                    <input type="password" name="password_confirmation" placeholder="Ulangi password baru" class="w-full bg-transparent border border-gray-300 rounded-lg px-4 py-3 text-sm text-[#090F31] focus:outline-none focus:border-[#090F31] focus:ring-1 focus:ring-[#090F31] transition-colors">
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-[#090F31] text-white font-bold px-6 py-2.5 rounded-lg hover:bg-gray-800 transition-colors">
                        Perbarui Password
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
