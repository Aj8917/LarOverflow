<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnswersController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//--------------------------- questions -----------------------------
Route::middleware('auth')->group(function () {
    Route::resource('questions', QuestionsController::class)->except( 'show');
});

Route::get('/', [QuestionsController::class, 'index'])->name('questions.index');

Route::get('/questions/{slug}',[QuestionsController::class,'show'])->name('questions.show');


//----------------------------- Answer ----------------------------------------------------
// Route::post('/questions/{question}/answers', 'AnswersController@store')->name('answers.store');
Route::resource('questions.answers', AnswersController::class)->except(['index', 'create', 'show']);

require __DIR__.'/auth.php';
