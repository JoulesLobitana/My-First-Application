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
        // Create an employer
        $employer = Employer::create([
            'name' => 'Tech Corp'
        ]);

        // Create job listings for that employer
        JobListing::create([
            'title' => 'Software Engineer',
            'salary' => '$80,000',
            'employer_id' => $employer->id
        ]);

        JobListing::create([
            'title' => 'Project Manager',
            'salary' => '$95,000',
            'employer_id' => $employer->id
        ]);
    }
}
