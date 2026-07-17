<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\Admin\SimulasiController as AdminSimulasiController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\MateriController as UserMateriController;
use App\Http\Controllers\User\SimulasiController;
use App\Http\Controllers\User\QuizController as UserQuizController;
use App\Http\Controllers\User\ProfileController as UserProfileController;

use App\Http\Controllers\Auth\GoogleAuthController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard & Fitur User

// Google OAuth
Route::middleware('guest')->group(function () {
    Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
});

Route::middleware(['auth', 'verified', 'user'])->prefix('user')->name('user.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [UserProfileController::class, 'edit'])
        ->name('profile');

    Route::patch('/profile', [UserProfileController::class, 'update'])
        ->name('profile.update');

    Route::post('/profile/foto', [UserProfileController::class, 'updateFoto'])
        ->name('profile.foto');

    Route::delete('/profile/foto', [UserProfileController::class, 'deleteFoto'])
        ->name('profile.foto.delete');

    Route::patch('/profile/password', [UserProfileController::class, 'updatePassword'])
        ->name('profile.password');

    Route::delete('/profile', [UserProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Materi
    Route::get('/materi', [UserMateriController::class, 'index'])
        ->name('materi');

    Route::get('/materi/{materi}', [UserMateriController::class, 'show'])
        ->name('materi.detail');

    // Simulasi
    Route::get('/simulasi', [SimulasiController::class, 'index'])->name('simulasi');
    Route::get('/materi/{materi}/simulasi', [SimulasiController::class, 'show'])->name('simulasi.show');
    Route::get('/materi/{materi}/simulasi/play', [SimulasiController::class, 'play'])->name('simulasi.play');
    Route::post('/materi/{materi}/simulasi/submit', [SimulasiController::class, 'submit'])->name('simulasi.submit');

    // Kuis
    Route::get('/kuis', [UserQuizController::class, 'index'])
        ->name('quiz');

    Route::get('/kuis/{quiz}', [UserQuizController::class, 'show'])
        ->name('quiz.preview');
        
    Route::get('/kuis/{quiz}/play', [UserQuizController::class, 'play'])
        ->name('quiz.play');

    Route::post('/kuis/{quiz}/submit', [UserQuizController::class, 'submit'])
        ->name('quiz.preview.submit');

    // Hasil Kuis
  
    Route::get('/hasil-kuis', [UserQuizController::class, 'riwayat'])
        ->name('quiz.riwayat');

    Route::get('/hasil-kuis/{quizResult}', [UserQuizController::class, 'hasil'])
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
        Route::patch('/pengguna/{user}', [PenggunaController::class, 'update'])
            ->name('pengguna.update');
        Route::delete('/pengguna/{user}', [PenggunaController::class, 'destroy'])
            ->name('pengguna.destroy');

        // Profil
        Route::get('/profile', [AdminProfileController::class, 'edit'])
            ->name('profile');

        Route::patch('/profile', [AdminProfileController::class, 'update'])
            ->name('profile.update');

        Route::patch('/profile/password', [AdminProfileController::class, 'updatePassword'])
            ->name('profile.password');

        // Materi
        Route::resource('materi', MateriController::class);

        // Simulasi
        Route::resource('simulasi', AdminSimulasiController::class);

        // Quiz
        Route::resource('quiz', AdminQuizController::class)
            ->except(['show']);
    });

require __DIR__.'/auth.php';