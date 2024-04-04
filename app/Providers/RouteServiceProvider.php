<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Question;
use Illuminate\Support\Facades\Route;
class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::bind('slug',function($slug)
        {
            $question=Question::where('slug',$slug)->firstOrFail();
            return $question?$question:abort(404);
        });
    }
}
