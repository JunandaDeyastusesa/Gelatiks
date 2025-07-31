<?php

namespace Database\Seeders;

use App\Models\NewsEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsEvent::create([
            'title' => 'Interview dengan Aqua',
            'content' => 'lorem ipsum',
            'image' => 'none',
            'event_date' => now(),
            'status' => 'Published',
        ]);

        NewsEvent::create([
            'title' => 'Trainer dari Alkaline',
            'content' => 'lorem ipsum',
            'image' => 'none',
            'event_date' => now(),
            'status' => 'Draft',
        ]);
    }
}
