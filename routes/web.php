<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MateriController;
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

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Materi
  
    Route::get('/materi', [UserMateriController::class, 'index'])
        ->name('user.materi.index');

    Route::get('/materi/{materi}', [UserMateriController::class, 'show'])
        ->name('user.materi.show');

    // Simulasi
 
    Route::get('/materi/{materi}/simulasi', [SimulasiController::class, 'show'])
        ->name('user.simulasi.show');

    Route::post('/materi/{materi}/simulasi/submit', [SimulasiController::class, 'submit'])
        ->name('user.simulasi.submit');

  
    // Quiz

    Route::get('/quiz/{quiz}', [UserQuizController::class, 'show'])
        ->name('user.quiz.show');

    Route::post('/quiz/{quiz}/submit', [UserQuizController::class, 'submit'])
        ->name('user.quiz.submit');

    // Hasil Quiz
  
    Route::get('/hasil-quiz', [UserQuizController::class, 'riwayat'])
        ->name('user.quiz.riwayat');

    Route::get('/hasil-quiz/{quizResult}', [UserQuizController::class, 'hasil'])
        ->name('user.quiz.hasil');
});


// Dashboard & Fitur Admin

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // ===== Profile Admin =====
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

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