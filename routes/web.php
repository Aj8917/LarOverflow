<?php

use App\Http\Controllers\AcceptAnswerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\FavouritesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteQuestionController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\VoteAnswerController;

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

Route::post('/answer/{answer}/accept',AcceptAnswerController::class)->name('answer.accept');

Route::middleware('auth')->group(function () {
Route::post('/questions/{question}/favorites',[FavouritesController::class,'store'])
        ->name('questions.favorite');
 Route::delete('/questions/{question}/favorites',[FavouritesController::class,'destory'])
        ->name('questions.unfavorite');
 
Route::post('/questions/{question}/vote', VoteQuestionController::class);
Route::post('/answers/{answer}/vote', VoteAnswerController::class);
});
require __DIR__.'/auth.php';
