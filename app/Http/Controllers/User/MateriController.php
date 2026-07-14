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
        $materis = Materi::select('id', 'judul', 'slug', 'deskripsi')
            ->latest()
            ->paginate(9);

        return view('user.materi', compact('materis'));
    }

    /**
     * Detail satu materi + info apakah simulasi & quiz-nya sudah tersedia.
     */
    public function show(Materi $materi)
    {
        $materi->load(['simulasi', 'quiz']);

        // Cek ketersediaan simulasi & quiz (cukup cek apakah record-nya ada)
        $adaSimulasi = $materi->simulasi !== null;
        $adaQuiz     = $materi->quiz !== null;

        // Skor quiz terakhir user untuk materi ini
        $skorTerakhir = null;
        if ($adaQuiz) {
            $skorTerakhir = $materi->quiz->results()
                ->where('user_id', Auth::id())
                ->latest()
                ->value('skor');
        }

        // Navigasi prev / next berdasarkan urutan id di database
        $allIds = Materi::orderBy('id')->pluck('id')->toArray();
        $currentIndex = array_search($materi->id, $allIds);

        $prev = ($currentIndex > 0)
            ? Materi::find($allIds[$currentIndex - 1])
            : null;

        $next = ($currentIndex < count($allIds) - 1)
            ? Materi::find($allIds[$currentIndex + 1])
            : null;

        return view('user.materi-detail', [
            'materi'       => $materi,
            'adaSimulasi'  => $adaSimulasi,
            'adaQuiz'      => $adaQuiz,
            'skorTerakhir' => $skorTerakhir,
            'prev'         => $prev,
            'next'         => $next,
        ]);
    }
}
