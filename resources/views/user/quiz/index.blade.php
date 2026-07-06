<x-app-layout>
    <div class="bg-[#0b1330] py-16 px-8 text-center">
        <h1 class="text-4xl font-bold text-white">Kuis Evaluasi <span class="text-yellow-400">Keamanan Siber</span></h1>
        <p class="text-gray-300 mt-4">Pilih topik untuk memulai kuis.</p>
    </div>

    <div class="max-w-6xl mx-auto py-10 px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($materis as $materi)
            <div class="bg-white rounded-xl overflow-hidden shadow">
                <div class="p-5">
                    <h3 class="font-bold text-lg">{{ $materi->judul }}</h3>
                    <p class="text-sm text-gray-600 mt-2">{{ $materi->deskripsi }}</p>
                    <a href="{{ route('user.quiz.show', $materi->quiz) }}" class="text-yellow-500 font-semibold mt-4 inline-block">
                        Mulai Kuis &rarr;
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>