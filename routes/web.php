<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\Admin\SimulasiController as AdminSimulasiController;

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\MateriController as UserMateriController;
use App\Http\Controllers\User\SimulasiController;
use App\Http\Controllers\User\QuizController as UserQuizController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard & Fitur User

Route::middleware(['auth', 'verified'])->prefix('user')->name('user.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Materi
    Route::get('/materi', [UserMateriController::class, 'index'])
        ->name('materi');

    Route::get('/materi/{materi}', [UserMateriController::class, 'show'])
        ->name('materi.detail');

    // Simulasi
    Route::view('/simulasi', 'user.simulasi')->name('simulasi');
    Route::get('/materi/{materi}/simulasi', [SimulasiController::class, 'show'])->name('simulasi.show');
    Route::get('/materi/{materi}/simulasi/play', [SimulasiController::class, 'play'])->name('simulasi.play');
    Route::post('/materi/{materi}/simulasi/submit', [SimulasiController::class, 'submit'])->name('simulasi.submit');

    // Quiz
    Route::get('/quiz', [UserQuizController::class, 'index'])
        ->name('quiz');

    Route::get('/quiz/{quiz}', [UserQuizController::class, 'show'])
        ->name('quiz.preview');
        
    Route::get('/quiz/{quiz}/play', [UserQuizController::class, 'show'])
        ->name('quiz.preview.play');

    Route::post('/quiz/{quiz}/submit', [UserQuizController::class, 'submit'])
        ->name('quiz.preview.submit');

    // Hasil Quiz
  
    Route::get('/hasil-quiz', [UserQuizController::class, 'riwayat'])
        ->name('quiz.riwayat');

    Route::get('/hasil-quiz/{quizResult}', [UserQuizController::class, 'hasil'])
        ->name('quiz.hasil');
});


// Dashboard & Fitur Admin

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // Pengguna
        Route::get('/pengguna', [PenggunaController::class, 'index'])
            ->name('pengguna');

        // ===== Profile Admin =====
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        // CRUD Materi
        Route::resource('materi', MateriController::class);

        // CRUD Simulasi
        Route::resource('simulasi', AdminSimulasiController::class);

        // CRUD Quiz
        Route::resource('quiz', AdminQuizController::class)
            ->except(['show']);
    });

require __DIR__.'/auth.php';