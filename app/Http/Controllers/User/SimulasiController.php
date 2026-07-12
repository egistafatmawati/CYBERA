<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    /**
     * Tampilkan data simulasi (3 skenario) untuk sebuah materi.
     * jawaban_benar TIDAK dikirim ke user di sini.
     */
    public function show($id)
    {
        // Mock $materi for prototyping
        $materi = (object) ['id' => $id, 'judul' => 'Keamanan Siber'];
        return view('user.simulasi.show', compact('materi'));
    }

    /**
     * Tampilkan halaman interaktif bermain simulasi.
     */
    public function play($id)
    {
        $materi = (object) ['id' => $id, 'judul' => 'Keamanan Siber'];
        return view('user.simulasi.play', compact('materi'));
    }

    
      //Submit jawaban simulasi (3 skenario sekaligus).
    
    public function submit(Request $request, Materi $materi)
    {
        $validated = $request->validate([
            'jawaban' => 'required|array|size:3',
            'jawaban.*.skenario_id' => 'required|exists:skenarios,id',
            'jawaban.*.jawaban_user' => 'required|string',
        ]);

        $materi->load('simulasi.skenarios');

        $hasil = [];

        foreach ($validated['jawaban'] as $item) {
            $skenario = $materi->simulasi->skenarios
                ->firstWhere('id', $item['skenario_id']);

            if (!$skenario) {
                continue;
            }

            $benar = strtolower($item['jawaban_user']) === strtolower($skenario->jawaban_benar);

            $hasil[] = [
                'skenario_id' => $skenario->id,
                'urutan' => $skenario->urutan,
                'benar' => $benar,
                'jawaban_benar' => $skenario->jawaban_benar,
                'penjelasan' => $skenario->penjelasan,
            ];
        }

        return response()->json([
            'message' => 'Simulasi selesai dikerjakan.',
            'hasil' => $hasil,
            'jumlah_benar' => collect($hasil)->where('benar', true)->count(),
            'total' => count($hasil),
        ]);
    }
}
