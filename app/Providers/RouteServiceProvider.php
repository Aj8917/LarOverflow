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
        // parent::boot();

        Route::bind('slug', function ($slug) {
            // Retrieve the question with answers and user eager loaded
            $question = Question::with('answers.user')->where('slug', $slug)->first();
    
            // If the question doesn't exist, return a 404 response
            if (!$question) {
                abort(404);
            }
    
            return $question;
        });
    }
}
