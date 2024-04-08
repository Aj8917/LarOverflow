<?php

namespace Database\Factories;
use Faker\Factory as FakerFactory;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create();
        return [
            'body' => $faker->paragraphs(rand(3, 7), true),
            'user_id' =>  User::pluck('id')->random(),
            'votes_count' => rand(0, 5),
        ];
    }
}
