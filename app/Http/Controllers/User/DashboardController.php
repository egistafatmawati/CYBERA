<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\QuizResult;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Data untuk chart "Kemajuan Belajar" di dashboard user.
     * Mengambil skor TERAKHIR per materi (bukan rata-rata semua attempt),
     * supaya progress terbaru yang tampil di grafik.
     */
    public function index()
    {
        $riwayat = QuizResult::with('quiz.materi')
            ->where('user_id', Auth::id())
            ->latest()
            ->get()
            ->unique('quiz_id') // ambil attempt terbaru per quiz
            ->sortBy('quiz_id');

        $kemajuan = $riwayat->map(function ($result) {
            return [
                'materi' => $result->quiz->materi->judul ?? '-',
                'skor' => $result->skor,
            ];
        })->values();

        $rataRata = $kemajuan->isNotEmpty()
            ? (int) round($kemajuan->avg('skor'))
            : 0;

        return view('user.dashboard', [
            'kemajuan' => $kemajuan,
            'rataRata' => $rataRata,
        ]);
    }
}
