<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobApply;

class JobApplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create job applications for users
        JobApply::create([
            'id' => \Illuminate\Support\Str::ulid(),
            'job_id' => \App\Models\Job::first()->id,
            'user_id' => \App\Models\User::where('username', 'antok')->first()->id,
            'status' => 'Review',
        ]);

        JobApply::create([
            'id' => \Illuminate\Support\Str::ulid(),
            'job_id' => \App\Models\Job::first()->id,
            'user_id' => \App\Models\User::where('username', 'anilestari')->first()->id,
            'status' => 'Interview',
        ]);
    }
}
