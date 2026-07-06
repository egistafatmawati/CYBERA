<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('materi')->withCount('questions')->latest()->paginate(10);

        return view('admin.quiz.index', compact('quizzes'));
    }

    public function create()
    {
        // Hanya materi yang belum punya quiz yang boleh dipilih (1 materi -> 1 quiz)
        $materis = Materi::whereDoesntHave('quiz')->get();

        return view('admin.quiz.create', compact('materis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'materi_id' => 'required|exists:materis,id|unique:quizzes,materi_id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $quiz = Quiz::create($validated);

        return redirect()
            ->route('admin.quiz.edit', $quiz)
            ->with('success', 'Quiz berhasil dibuat. Silakan tambahkan soal.');
    }

    public function edit(Quiz $quiz)
    {
        $quiz->load('questions.options', 'materi');

        return view('admin.quiz.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',

            'questions' => 'required|array|min:1',
            'questions.*.id' => 'nullable|exists:quiz_questions,id',
            'questions.*.urutan' => 'required|integer|min:1',
            'questions.*.pertanyaan' => 'required|string',
            'questions.*.jenis_jawaban' => 'required|in:pilihan_ganda,ya_tidak',
            'questions.*.jawaban_benar' => 'required|string',

            'questions.*.opsis' => 'nullable|array',
            'questions.*.opsis.*.kode' => 'required_with:questions.*.opsis|string|max:1',
            'questions.*.opsis.*.teks_opsi' => 'required_with:questions.*.opsis|string',
        ]);

        DB::transaction(function () use ($validated, $quiz) {
            $quiz->update([
                'judul' => $validated['judul'],
                'deskripsi' => $validated['deskripsi'] ?? null,
            ]);

            $keptIds = [];

            foreach ($validated['questions'] as $data) {
                $question = $quiz->questions()->updateOrCreate(
                    ['id' => $data['id'] ?? null],
                    [
                        'urutan' => $data['urutan'],
                        'pertanyaan' => $data['pertanyaan'],
                        'jenis_jawaban' => $data['jenis_jawaban'],
                        'jawaban_benar' => $data['jawaban_benar'],
                    ]
                );

                $keptIds[] = $question->id;

                $question->options()->delete();

                if ($data['jenis_jawaban'] === 'pilihan_ganda' && !empty($data['opsis'])) {
                    foreach ($data['opsis'] as $opsi) {
                        $question->options()->create([
                            'kode' => $opsi['kode'],
                            'teks_opsi' => $opsi['teks_opsi'],
                        ]);
                    }
                }
            }

            // Hapus soal yang tidak lagi dikirim (dihapus admin di form)
            $quiz->questions()->whereNotIn('id', $keptIds)->delete();
        });

        return redirect()
            ->route('admin.quiz.edit', $quiz)
            ->with('success', 'Quiz berhasil diperbarui.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()
            ->route('admin.quiz.index')
            ->with('success', 'Quiz berhasil dihapus.');
    }
}
