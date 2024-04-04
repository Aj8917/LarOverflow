<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('questions', QuestionsController::class)->except( 'show');
});

Route::get('questions', [QuestionsController::class, 'index'])->name('questions.index');

Route::get('/questions/{slug}',[QuestionsController::class,'show'])->name('questions.show');

require __DIR__.'/auth.php';
