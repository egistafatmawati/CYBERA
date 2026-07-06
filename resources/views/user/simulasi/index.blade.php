<x-app-layout>
    <div class="bg-[#0b1330] py-16 px-8 text-center">
        <h1 class="text-4xl font-bold text-white">Uji Kemampuan Anda dengan <span class="text-yellow-400">Simulasi Nyata</span></h1>
        <p class="text-gray-300 mt-4 max-w-2xl mx-auto">
            Hadapi skenario keamanan siber yang realistis dan latih insting Anda melindungi diri dari ancaman digital.
        </p>
    </div>

    <div class="max-w-6xl mx-auto py-10 px-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($materis as $materi)
            <div class="bg-[#2a2f52] rounded-xl p-6 text-white">
                <div class="bg-yellow-400 w-10 h-10 rounded-md flex items-center justify-center mb-4">
                    🛡️
                </div>
                <h3 class="text-xl font-semibold mb-2">Simulasi {{ $materi->judul }}</h3>
                <p class="text-gray-300 text-sm mb-4">{{ $materi->deskripsi }}</p>
                <a href="{{ route('user.simulasi.show', $materi) }}" class="text-yellow-400">▶</a>
            </div>
        @endforeach
    </div>
</x-app-layout>