<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Answer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory(3)->create()->each(function($user) {
            
        //    // For each user, create between 1 and 5 questions
        //    Question::factory()->count(random_int(1, 5))
        //             ->create(['user_id' => $user->id])
        //              ->each(function ($question) {
        //                     $answers = Answer::factory(rand(1, 5))->make();
        //                     $question->answers()->saveMany($answers);
        //                     // Update the answer_count column
        //                     $question->update(['answers_count' => $answers->count()]);
        //                  });
        // });

        $this->call([
                UsersQuestionsAnswersTableSeeder::class,
                FavoritesTableSeeder::class,
                VotableTableSeeder::class
        ]);
    }


   
}
