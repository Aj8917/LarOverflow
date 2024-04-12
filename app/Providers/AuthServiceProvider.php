<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Policies\QuestionPolicy;
use App\Models\Question;
use App\Answer;
use App\Policies\AnswerPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

     protected $policies =[
        Question::class => QuestionPolicy::class,
        Answer::class=>AnswerPolicy::class,
];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
        
        Gate::policy(Question::class, QuestionPolicy::class);
        // \Gate::define('update-question', function($user,$question)
        // {
        //     return $user->id==$question->user_id;
        // });

        // \Gate::define('delete-question', function($user,$question){
        //     return $user->id==$question->user_id;
        // });
    }
}
