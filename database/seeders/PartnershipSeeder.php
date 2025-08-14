<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partnership;

class PartnershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partnership::create([
            'name' => 'Aqua',
            'start_contract' => now(),
            'end_contract' => now(),
            'image' => 'none',
        ]);
    }
}
