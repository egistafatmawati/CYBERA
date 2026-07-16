<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('materi')->latest()->get();
        return view('user.quiz', compact('quizzes'));
    }
    
     // Tampilkan soal quiz untuk dikerjakan.
     // jawaban_benar TIDAK ikut dikirim ke frontend.
    
    public function show(Quiz $quiz)
    {
        $quiz->load(['questions.options']);

        $questions = $quiz->questions->map(function ($q) {
            return [
                'id' => $q->id,
                'urutan' => $q->urutan,
                'pertanyaan' => $q->pertanyaan,
                'jenis_jawaban' => $q->jenis_jawaban,
                'opsis' => $q->options->map(fn ($o) => [
                    'kode' => $o->kode,
                    'teks_opsi' => $o->teks_opsi,
                ]),
            ];
        });

        return view('user.quiz.show', compact('quiz', 'questions'));
    }

    public function play(Quiz $quiz)
    {
        $quiz->load(['questions.options']);

        $questions = $quiz->questions->map(function ($q) {
            return [
                'id' => $q->id,
                'urutan' => $q->urutan,
                'pertanyaan' => $q->pertanyaan,
                'jenis_jawaban' => $q->jenis_jawaban,
                'opsis' => $q->options
            ];
        });

        return view('user.quiz.play', compact('quiz', 'questions'));
    }

    //Submit jawaban quiz, hitung skor, simpan Hasil Quiz + detail per soal.
    public function submit(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'jawaban' => 'required|array|min:1',
            'jawaban.*.question_id' => 'required|exists:quiz_questions,id',
            'jawaban.*.jawaban_user' => 'required|string',
        ]);

        $quiz->load('questions');

        $result = DB::transaction(function () use ($validated, $quiz) {
            $totalSoal = $quiz->questions->count();
            $jumlahBenar = 0;
            $details = [];

            foreach ($validated['jawaban'] as $item) {
                $question = $quiz->questions->firstWhere('id', $item['question_id']);

                if (!$question) {
                    continue;
                }

                $isCorrect = strtolower($item['jawaban_user']) === strtolower($question->jawaban_benar);

                if ($isCorrect) {
                    $jumlahBenar++;
                }

                $details[] = [
                    'quiz_question_id' => $question->id,
                    'jawaban_user' => $item['jawaban_user'],
                    'is_correct' => $isCorrect,
                ];
            }

            $jumlahSalah = $totalSoal - $jumlahBenar;
            $skor = $totalSoal > 0 ? (int) round(($jumlahBenar / $totalSoal) * 100) : 0;

            $quizResult = QuizResult::create([
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id,
                'total_soal' => $totalSoal,
                'jumlah_benar' => $jumlahBenar,
                'jumlah_salah' => $jumlahSalah,
                'skor' => $skor,
            ]);

            $quizResult->details()->createMany($details);

            return $quizResult;
        });

        return redirect()
            ->route('user.quiz.hasil', $result)
            ->with('success', 'Quiz berhasil dikerjakan.');
    }

    //Halaman Hasil Quiz (detail 1 attempt)
    public function hasil(QuizResult $quizResult)
    {
        // Pastikan user hanya bisa lihat hasilnya sendiri
        abort_unless($quizResult->user_id === Auth::id(), 403);

        $quizResult->load(['quiz', 'details.question']);

        return view('user.quiz.hasil', compact('quizResult'));
    }

    // Riwayat semua hasil quiz milik user 
     
    public function riwayat()
    {
        $riwayat = QuizResult::with('quiz.materi')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('user.quiz.riwayat', compact('riwayat'));
    }
}
