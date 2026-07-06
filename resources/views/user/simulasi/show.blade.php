<x-app-layout>
    <div
        x-data="simulasiApp({{ $skenarios->toJson() }}, '{{ route('user.simulasi.submit', $materi) }}', '{{ route('user.materi.show', $materi) }}')"
        class="max-w-4xl mx-auto py-8 px-6"
    >
        <a href="{{ route('user.simulasi.index') }}" class="text-yellow-400">&larr; Keluar</a>

        <template x-for="s in [current]" :key="s.id">
            <div>
                <div class="bg-[#2a2f52] text-white rounded-xl p-6 mt-6 whitespace-pre-line" x-text="s.skenario"></div>

                <div class="mt-8">
                    <p class="font-semibold mb-3" x-text="s.pertanyaan"></p>

                    <template x-if="s.jenis_jawaban === 'ya_tidak'">
                        <div class="space-y-3">
                            <button type="button" @click="pilih('ya')"
                                class="w-full text-left p-4 rounded-lg border"
                                :class="warnaOpsi('ya')">
                                A. Ya
                            </button>
                            <button type="button" @click="pilih('tidak')"
                                class="w-full text-left p-4 rounded-lg border"
                                :class="warnaOpsi('tidak')">
                                B. Tidak
                            </button>
                        </div>
                    </template>

                    <template x-if="s.jenis_jawaban === 'pilihan_ganda'">
                        <div class="space-y-3">
                            <template x-for="o in s.opsis" :key="o.kode">
                                <button type="button" @click="pilih(o.kode)"
                                    class="w-full text-left p-4 rounded-lg border"
                                    :class="warnaOpsi(o.kode)">
                                    <span x-text="o.kode + '. ' + o.teks_opsi"></span>
                                </button>
                            </template>
                        </div>
                    </template>
                </div>

                <div x-show="terjawab" x-cloak class="mt-6 border rounded-lg p-4">
                    <p class="font-bold flex items-center gap-2">⚠ Penjelasan</p>
                    <p class="mt-2 text-sm" x-text="s.penjelasan"></p>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="button" @click="next()" x-show="terjawab"
                        class="bg-[#0b1330] text-yellow-400 font-semibold px-6 py-3 rounded-lg">
                        <span x-text="isLast ? 'Selesai' : 'Berikutnya'"></span>
                    </button>
                </div>
            </div>
        </template>
    </div>

    <script>
        function simulasiApp(skenarios, submitUrl, redirectUrl) {
            return {
                skenarios: skenarios,
                index: 0,
                terjawab: false,
                jawabanUser: null,
                jawabanTersimpan: [],
                get current() { return this.skenarios[this.index]; },
                get isLast() { return this.index === this.skenarios.length - 1; },
                pilih(kode) {
                    if (this.terjawab) return; // sudah dijawab, tidak bisa ganti
                    this.jawabanUser = kode;
                    this.terjawab = true;
                    this.jawabanTersimpan.push({
                        skenario_id: this.current.id,
                        jawaban_user: kode,
                    });
                },
                warnaOpsi(kode) {
                    if (!this.terjawab) return 'border-gray-500 text-white';
                    if (kode === this.current.jawaban_benar) return 'bg-green-500 border-green-600 text-black';
                    if (kode === this.jawabanUser) return 'bg-red-500 border-red-600 text-black';
                    return 'border-gray-500 text-white opacity-50';
                },
                next() {
                    if (this.isLast) {
                        fetch(submitUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                            body: JSON.stringify({ jawaban: this.jawabanTersimpan }),
                        }).finally(() => {
                            window.location.href = redirectUrl;
                        });
                        return;
                    }
                    this.index++;
                    this.terjawab = false;
                    this.jawabanUser = null;
                },
            };
        }
    </script>
</x-app-layout>