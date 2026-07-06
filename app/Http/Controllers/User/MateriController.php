<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    /**
     * Daftar semua materi yang bisa dibaca user.
     */
    public function index()
    {
        $materis = Materi::select('id', 'judul', 'slug', 'isi')
            ->latest()
            ->paginate(9);

        return view('user.materi.index', compact('materis'));
    }

    /**
     * Detail satu materi + info apakah simulasi & quiz-nya sudah tersedia
     * (dipakai frontend untuk menampilkan/menyembunyikan tombol
     * "Mulai Simulasi" dan "Mulai Quiz").
     */
    public function show(Materi $materi)
    {
        $materi->load(['simulasi.skenarios', 'quiz.questions']);

        $adaSimulasi = $materi->simulasi && $materi->simulasi->skenarios->count() > 0;
        $adaQuiz = $materi->quiz && $materi->quiz->questions->count() > 0;

        // Progress user untuk materi ini (skor quiz terakhir, kalau sudah pernah dikerjakan)
        $skorTerakhir = null;

        if ($adaQuiz) {
            $skorTerakhir = $materi->quiz->results()
                ->where('user_id', Auth::id())
                ->latest()
                ->value('skor');
        }

        return view('user.materi.show', [
            'materi' => $materi,
            'adaSimulasi' => $adaSimulasi,
            'adaQuiz' => $adaQuiz,
            'skorTerakhir' => $skorTerakhir,
        ]);
    }
}
