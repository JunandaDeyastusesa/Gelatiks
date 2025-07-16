<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobCategoryTableSeeder extends Seeder
{
    public function run()
    {
        JobCategory::create([
            'id' => Str::ulid(),
            'no' => 1,
            'category_name' => 'Marketing',
        ],);
    }
}
