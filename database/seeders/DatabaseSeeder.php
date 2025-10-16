<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employer;
use App\Models\JobListing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    \App\Models\User::factory()->create([
        'name' => 'ikaw masarap',
        'email' => 'masarap@example.com',
    ]);

    $tags = \App\Models\Tag::factory(10)->create();

    \App\Models\Job::factory(20)->create()->each(function ($job) use ($tags) {
        $job->tags()->attach($tags->random(2));
    });
}

}
