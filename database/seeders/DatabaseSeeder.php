<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::factory(3)->create()->each(function($user) {
            
           // For each user, create between 1 and 5 questions
           Question::factory()->count(random_int(1, 5))->create(['user_id' => $user->id]);
        });
    }
}
