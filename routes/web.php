<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('questions',QuestionsController::class);