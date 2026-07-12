@extends('layouts.user')

@section('content')

@php
    // Dummy Data
    $judulSimulasi = 'Simulasi ' . ($materi->judul ?? 'Keamanan Siber');
    
    $skenarios = [
        [
            'id' => 1,
            'tipe' => 'email',
            'skenario' => [
                'dari' => 'security@bankbni.co.id',
                'subjek' => 'URGENT: Akun Anda Terdeteksi Aktivitas Mencurigakan!',
                'pesan' => 'Yth. Nasabah Setia BNI,<br><br>Sistem kami mendeteksi adanya upaya login mencurigakan dari perangkat tidak dikenal di akun Anda. Demi keamanan, akun Anda sementara kami blokir.<br><br>Untuk membuka blokir dan memverifikasi identitas Anda, silakan klik tautan berikut:<br><br><a href="#" class="text-blue-400 underline">http://bni-verifikasi-akun.xyz/verify</a><br><br>Anda wajib melakukan verifikasi dalam 1x24 jam. Jika tidak, akun Anda akan dinonaktifkan permanen.<br><br>Terima kasih,<br>Tim Keamanan BNI'
            ],
            'pertanyaan' => 'Apakah Email ini Phishing?',
            'opsis' => [
                ['id' => 'A', 'teks' => 'Ya, Ini Phishing', 'is_benar' => true],
                ['id' => 'B', 'teks' => 'Tidak, Ini Aman', 'is_benar' => false]
            ],
            'penjelasan' => 'Ini adalah email phishing! Bank tidak akan pernah meminta Anda mengklik tautan dari domain tidak resmi. Domain resmi BNI adalah bni.co.id. Selain itu, bank selalu menyapa nasabah dengan nama lengkap, bukan \'Nasabah Setia\'.'
        ],
        [
            'id' => 2,
            'tipe' => 'chat',
            'skenario' => [
                ['pengirim' => 'Penelepon', 'pesan' => 'Selamat siang, Bapak/Ibu Budi Santoso? Saya Andi dari Customer Service BCA. Kami mendeteksi transaksi mencurigakan sebesar Rp 2.500.000 dari akun Anda 5 menit yang lalu.'],
                ['pengirim' => 'Anda', 'pesan' => 'Transaksi apa? Saya tidak melakukan transaksi apa pun!'],
                ['pengirim' => 'Penelepon', 'pesan' => 'Untuk memblokir transaksi tersebut, mohon sebutkan kode OTP yang baru saja kami kirimkan ke nomor Anda.']
            ],
            'pertanyaan' => 'Apa yang harus Anda lakukan?',
            'opsis' => [
                ['id' => 'A', 'teks' => 'Berikan data yang diminta agar akun segera diblokir', 'is_benar' => false],
                ['id' => 'B', 'teks' => 'Tutup telepon dan hubungi nomor resmi bank yang tertera di kartu ATM Anda', 'is_benar' => true],
                ['id' => 'C', 'teks' => 'Tanyakan balik identitas penelepon secara detail', 'is_benar' => false],
                ['id' => 'D', 'teks' => 'Ikuti instruksinya karena dia tahu nama dan bank Anda', 'is_benar' => false]
            ],
            'penjelasan' => 'Ini social engineering tipe vishing (voice phishing)! Bank TIDAK PERNAH meminta nomor kartu lengkap, CVV, PIN, atau OTP melalui telepon. Tutup telepon dan hubungi nomor resmi bank Anda. Informasi nama dan bank Anda bisa didapat dari media sosial atau kebocoran data.'
        ]
    ];
@endphp

<!-- Dark Wrapper -->
<div class="bg-[#090F31] min-h-screen pt-8 pb-32">
    <div class="w-full max-w-[800px] mx-auto px-6">
        
        <!-- Header / Back Button -->
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('user.simulasi.show', ['materi' => $materi->id ?? 1]) }}" class="flex items-center gap-2 text-[#FFCC00] font-bold hover:text-yellow-400 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Keluar
            </a>
            <!-- <div class="text-white font-bold tracking-wide">{{ $judulSimulasi }}</div> -->
        </div>

        @foreach($skenarios as $index => $skenario)
        <!-- Kotak Skenario Utama (Hanya Tampilkan Yang Aktif) -->
        <div id="skenario-{{ $index }}" class="skenario-container {{ $index > 0 ? 'hidden' : '' }}">
            
            <!-- Skenario Box -->
            <div class="border border-[#4B5563] rounded-xl p-6 md:p-8 mb-8 bg-[#1F2937]/50 shadow-lg text-gray-200">
                @if($skenario['tipe'] == 'email')
                    <!-- Layout Teks / Email -->
                    <div class="space-y-4">
                        <div class="text-sm text-gray-400 mb-6 border-b border-gray-600 pb-4">
                            <p>Dari: {{ $skenario['skenario']['dari'] }}</p>
                            <p>Subjek: {{ $skenario['skenario']['subjek'] }}</p>
                        </div>
                        <div class="leading-relaxed">
                            {!! $skenario['skenario']['pesan'] !!}
                        </div>
                    </div>

                @elseif($skenario['tipe'] == 'chat')
                    <!-- Layout Bubble Chat -->
                    <div class="space-y-6">
                        @foreach($skenario['skenario'] as $chat)
                            <div class="flex flex-col {{ $chat['pengirim'] == 'Anda' ? 'items-end' : 'items-start' }}">
                                <span class="text-xs text-gray-400 mb-1 px-1">{{ $chat['pengirim'] }}</span>
                                <div class="px-4 py-3 rounded-2xl max-w-[85%] shadow-md {{ $chat['pengirim'] == 'Anda' ? 'bg-[#FFCC00] text-[#090F31] rounded-tr-none font-medium' : 'bg-[#374151] text-gray-200 rounded-tl-none' }}">
                                    {{ $chat['pesan'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Pertanyaan Base Container (White Box style from image) -->
            <div class="bg-white text-black p-6 md:p-10 rounded-xl shadow-xl mt-4 relative z-10 -mx-4 md:mx-0">
                
                <h3 class="text-lg md:text-xl font-bold mb-6">{{ $skenario['pertanyaan'] }}</h3>

                <!-- Opsi Jawaban -->
                <div class="flex flex-col gap-4 mb-8" id="opsi-container-{{ $index }}">
                    @foreach($skenario['opsis'] as $opsi)
                        <button type="button" 
                            onclick="jawab({{ $index }}, '{{ $opsi['id'] }}', {{ $opsi['is_benar'] ? 'true' : 'false' }})"
                            id="btn-{{ $index }}-{{ $opsi['id'] }}"
                            class="opsi-btn text-left px-6 py-4 rounded-lg border-2 border-gray-300 font-medium transition-all hover:border-[#FFCC00] hover:text-[#FFCC00] flex items-center">
                            <span class="mr-3 font-bold">{{ $opsi['id'] }}.</span> 
                            {{ $opsi['teks'] }}
                        </button>
                    @endforeach
                </div>

                <!-- Penjelasan (Awalnya Sembunyi) -->
                <div id="penjelasan-{{ $index }}" class="hidden border-2 border-gray-200 rounded-xl p-6 bg-gray-50 mb-8 transition-all">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-[#090F31] text-white w-8 h-8 rounded flex items-center justify-center font-bold text-lg">!</div>
                        <h4 class="font-bold text-xl text-[#090F31]" style="font-family: 'Audiowide', sans-serif;">Penjelasan</h4>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        {{ $skenario['penjelasan'] }}
                    </p>
                </div>

                <!-- Tombol Navigasi Berikutnya -->
                <div class="flex justify-end hidden" id="navigasi-{{ $index }}">
                    @if($index < count($skenarios) - 1)
                        <button type="button" onclick="nextSkenario({{ $index }})" class="bg-[#090F31] text-[#FFCC00] font-bold px-8 py-3 rounded-full hover:bg-blue-900 transition-colors shadow-lg">
                            Berikutnya
                        </button>
                    @else
                        <a href="{{ route('user.materi.show', ['materi' => $materi->id ?? 1]) }}" class="bg-[#FFCC00] text-[#090F31] font-bold px-8 py-3 rounded-full hover:bg-yellow-500 transition-colors shadow-lg">
                            Selesai Simulasi
                        </a>
                    @endif
                </div>

            </div>
        </div>
        @endforeach

    </div>
</div>

@push('scripts')
<script>
    // Menyimpan state agar user hanya bisa jawab 1 kali per skenario
    let answered = {};

    function jawab(indexSkenario, opsiId, isBenar) {
        if (answered[indexSkenario]) return; // Sudah jawab

        answered[indexSkenario] = true;
        
        const container = document.getElementById(`opsi-container-${indexSkenario}`);
        const buttons = container.querySelectorAll('.opsi-btn');

        // Reset all buttons style first (disable them)
        buttons.forEach(btn => {
            btn.classList.add('opacity-50', 'cursor-not-allowed');
            btn.classList.remove('hover:border-[#FFCC00]', 'hover:text-[#FFCC00]');
        });

        // Highlight the clicked button
        const clickedBtn = document.getElementById(`btn-${indexSkenario}-${opsiId}`);
        clickedBtn.classList.remove('opacity-50');
        
        if (isBenar) {
            // Hijau
            clickedBtn.classList.remove('border-gray-300');
            clickedBtn.classList.add('bg-[#00E050]', 'border-[#00E050]', 'text-[#090F31]', 'shadow-lg');
        } else {
            // Merah
            clickedBtn.classList.remove('border-gray-300');
            clickedBtn.classList.add('bg-[#CC0000]', 'border-[#CC0000]', 'text-white', 'shadow-lg');
            
            // Cari tombol yang benar dan beri warna hijau (opsional untuk memberitahu yang benar)
            // Di desain ini kita bisa highlight yang benar juga.
        }

        // Tampilkan Penjelasan
        const penjelasan = document.getElementById(`penjelasan-${indexSkenario}`);
        penjelasan.classList.remove('hidden');
        penjelasan.classList.add('animate-fade-in-up'); // Tailwind animation class jika ada

        // Tampilkan Tombol Berikutnya
        const navigasi = document.getElementById(`navigasi-${indexSkenario}`);
        navigasi.classList.remove('hidden');
    }

    function nextSkenario(currentIndex) {
        document.getElementById(`skenario-${currentIndex}`).classList.add('hidden');
        document.getElementById(`skenario-${currentIndex + 1}`).classList.remove('hidden');
        // Scroll to top of scenario box
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>

<style>
    .animate-fade-in-up {
        animation: fadeInUp 0.5s ease-out forwards;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@endsection
