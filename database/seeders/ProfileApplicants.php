<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProfileApplicant;
use Illuminate\Database\Seeder;
use App\Models\JobCategory;
use Illuminate\Support\Str;
use App\Models\User;

class ProfileApplicants extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // This seeder is intentionally left empty.
        // It can be used to seed profile applicants data in the future.
        // You can add logic here to create or update profile applicants as needed.

        // --- IGNORE ---
        // Example:
        ProfileApplicant::create([
            'id' => Str::ulid(),
            'user_id' => User::first()->id,
            'category_id' => JobCategory::first()->id,
            'namaLengkap' => 'Junanda',
            'kelahiran' => '1990-01-01',
            'kelamin' => 'Laki-laki',
            'telp' => '1234567890',
            'pendidikan' => 'S1 Teknik Informatika',
            'domisili' => 'Jakarta',
            'pengKerja1' => 'Perusahaan A',
            'pengKerja2' => 'Perusahaan B',
            'pengKerja3' => 'Perusahaan C',
        ]);
    }
}
