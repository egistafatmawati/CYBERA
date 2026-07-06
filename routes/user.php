<?php

use App\Http\Controllers\User\QuizController;
use App\Http\Controllers\User\SimulasiController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {

    // Simulasi
    Route::get('materi/{materi}/simulasi', [SimulasiController::class, 'show'])
        ->name('user.simulasi.show');
    Route::post('materi/{materi}/simulasi/submit', [SimulasiController::class, 'submit'])
        ->name('user.simulasi.submit');

    // Quiz
    Route::get('quiz/{quiz}', [QuizController::class, 'show'])
        ->name('user.quiz.show');
    Route::post('quiz/{quiz}/submit', [QuizController::class, 'submit'])
        ->name('user.quiz.submit');

    // Hasil Quiz
    Route::get('hasil-quiz', [QuizController::class, 'riwayat'])
        ->name('user.quiz.riwayat');
    Route::get('hasil-quiz/{quizResult}', [QuizController::class, 'hasil'])
        ->name('user.quiz.hasil');
});
