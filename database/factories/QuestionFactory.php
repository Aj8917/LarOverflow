<?php

namespace Database\Factories;
use Faker\Factory as FakerFactory;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model=Question::class;
    public function definition(): array
    { 
        $faker = FakerFactory::create();

        return [
            'title' => rtrim($faker->sentence($faker->numberBetween(5, 10)), '.'),
            'body' => $faker->paragraphs($faker->numberBetween(3, 7), true),
            'views' => $faker->numberBetween(0, 10),
           // 'answers_count' => $faker->numberBetween(0, 10),
            //'votes_count' => $faker->numberBetween(-3, 10)
        ];
    }
}
