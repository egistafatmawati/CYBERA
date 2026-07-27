<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    public function index()
    {
        // Statistik ringkas
        $totalUser = User::where('role', 'pengguna')->count();
        $totalMateri = Materi::count();
        $totalQuiz = Quiz::count();
        $totalAttempt = QuizResult::count();
        $rataRataSkor = (int) round(QuizResult::avg('skor') ?? 0);

        // Rata-rata skor per materi + jumlah peserta unik yang sudah mengerjakan
        $skorPerMateri = QuizResult::query()
            ->join('quizzes', 'quiz_results.quiz_id', '=', 'quizzes.id')
            ->join('materis', 'quizzes.materi_id', '=', 'materis.id')
            ->select(
                'materis.judul',
                DB::raw('ROUND(AVG(quiz_results.skor)) as rata_rata'),
                DB::raw('COUNT(DISTINCT quiz_results.user_id) as jumlah_peserta')
            )
            ->groupBy('materis.judul')
            ->orderByDesc('rata_rata')
            ->get();

        // Distribusi nilai (histogram rentang skor)
        $distribusiNilai = [
            '90-100' => QuizResult::whereBetween('skor', [90, 100])->count(),
            '80-89'  => QuizResult::whereBetween('skor', [80, 89])->count(),
            '70-79'  => QuizResult::whereBetween('skor', [70, 79])->count(),
            '60-69'  => QuizResult::whereBetween('skor', [60, 69])->count(),
            '<60'    => QuizResult::where('skor', '<', 60)->count(),
        ];

        $nilaiTinggi = QuizResult::where('skor', '>=', 80)->count();
        $persenNilaiTinggi = $totalAttempt > 0
            ? round(($nilaiTinggi / $totalAttempt) * 100)
            : 0;

        // 5 aktivitas quiz terbaru (untuk log aktivitas di dashboard admin)
        $aktivitasTerbaru = QuizResult::with('user', 'quiz.materi')
            ->latest()
            ->limit(5)
            ->get();

        // User yang belum pernah mengerjakan quiz sama sekali 
        $userBelumAktif = User::where('role', 'user')
            ->whereDoesntHave('quizResults')
            ->count();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalMateri',
            'totalQuiz',
            'totalAttempt',
            'rataRataSkor',
            'skorPerMateri',
            'distribusiNilai',
            'nilaiTinggi',
            'persenNilaiTinggi',
            'aktivitasTerbaru',
            'userBelumAktif'
        ));
    }
}