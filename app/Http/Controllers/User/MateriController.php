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
            ->orderByRaw("
                CASE 
                    WHEN judul LIKE '%Dasar Keamanan Siber%' THEN 1 
                    WHEN judul LIKE '%Phishing%' THEN 2 
                    WHEN judul LIKE '%Malware%' THEN 3 
                    WHEN judul LIKE '%Ransomware%' THEN 4 
                    WHEN judul LIKE '%Social Engineering%' THEN 5 
                    WHEN judul LIKE '%Password Security%' THEN 6 
                    WHEN judul LIKE '%Clear Screen%' THEN 7 
                    ELSE 99 
                END ASC
            ")
            ->orderBy('id', 'asc')
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

        // Navigasi prev / next berdasarkan urutan kustom
        $allIds = Materi::orderByRaw("
            CASE 
                WHEN judul LIKE '%Dasar Keamanan Siber%' THEN 1 
                WHEN judul LIKE '%Phishing%' THEN 2 
                WHEN judul LIKE '%Malware%' THEN 3 
                WHEN judul LIKE '%Ransomware%' THEN 4 
                WHEN judul LIKE '%Social Engineering%' THEN 5 
                WHEN judul LIKE '%Password Security%' THEN 6 
                WHEN judul LIKE '%Clear Screen%' THEN 7 
                ELSE 99 
            END ASC
        ")->orderBy('id', 'asc')->pluck('id')->toArray();
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
