<?php

use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\QuizController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Materi 
    Route::resource('materi', MateriController::class)->except(['show']);

    // Quiz
    Route::resource('quiz', QuizController::class)->except(['show']);
});
