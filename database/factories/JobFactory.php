<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employer;
use App\Models\Tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'salary' => fake()->randomElement(['$50,000 USD', '$90,000 USD', '$150,000 USD']),
            'employer_id' => Employer::factory(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (\App\Models\Job $job) {
            $tags = Tag::factory()->count(rand(1, 3))->create();
            $job->tags()->attach($tags->pluck('id'));
        });
    }
} // 👈 asdfkjfalksjalksfjsalkj mao ni problema
