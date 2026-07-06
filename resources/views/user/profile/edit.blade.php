<x-app-layout>
    <div class="max-w-3xl mx-auto py-8 px-6 text-white">

        <div class="flex flex-col items-center">
            <div class="relative">
                <img src="{{ auth()->user()->foto ? asset('storage/'.auth()->user()->foto) : asset('images/default-avatar.png') }}"
                     class="w-40 h-40 rounded-full object-cover border-4 border-white">

                @if(auth()->user()->foto)
                    <form method="POST" action="{{ route('profile.photo.destroy') }}" class="absolute bottom-0 right-0">
                        @csrf @method('DELETE')
                        <button class="bg-red-600 text-white rounded-full w-9 h-9">🗑</button>
                    </form>
                @endif
            </div>

            <form method="POST" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" class="mt-4">
                @csrf
                <input type="file" name="foto" accept="image/*" onchange="this.form.submit()" class="text-sm">
            </form>
        </div>

        <h2 class="text-2xl font-bold mt-8">Profil Saya</h2>

        <form method="POST" action="{{ route('profile.update') }}" class="bg-[#2a2f52] rounded-xl p-6 mt-4 space-y-4">
            @csrf @method('PATCH')

            <div>
                <label class="block mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name', $request->user()->name) }}"
                       class="w-full rounded-lg bg-[#4a4f72] p-3">
            </div>

            <div>
                <label class="block mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $request->user()->email) }}"
                       class="w-full rounded-lg bg-[#4a4f72] p-3">
            </div>

            <button type="submit" class="bg-green-500 text-black font-semibold px-6 py-2 rounded-lg">Simpan</button>
        </form>

        <h2 class="text-2xl font-bold mt-8">Keamanan</h2>

        <form method="POST" action="{{ route('password.update') }}" class="bg-[#2a2f52] rounded-xl p-6 mt-4">
            @csrf @method('PUT')

            <label class="block mb-1">Password Baru</label>
            <input type="password" name="password" class="w-full rounded-lg bg-[#4a4f72] p-3 mb-3">

            <label class="block mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full rounded-lg bg-[#4a4f72] p-3 mb-4">

            <button type="submit" class="bg-red-600 text-white font-semibold px-6 py-2 rounded-lg">Reset Password</button>
        </form>
    </div>
</x-app-layout>