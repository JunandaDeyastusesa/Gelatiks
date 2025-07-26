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
        $usersApplicants = User::whereHas('roles', function ($query) {
            $query->where('name', 'Applicants');
        })->take(2)->get();

        foreach ($usersApplicants as $key => $user) {
            ProfileApplicant::create([
                'id' => Str::ulid(),
                'user_id' => $user->id,
                'category' => $key == 0 ? 'Sales' : 'MD',
                'namaLengkap' => $key == 0 ? 'anilestari' : 'antok',
                'kelahiran' => $key == 0 ? '1990-01-01' : '2000-01-01',
                'kelamin' => $key == 0 ? 'Wanita' : 'Pria',
                'telp' => '1234567890',
                'pendidikan' => $key == 0 ? 'S1 Marketing' : 'S2 Marketing',
                'domisili' => $key == 0 ? 'Jakarta' : 'Surabaya',
                'pengKerja1' => 'Perusahaan A',
                'pengKerja2' => 'Perusahaan B',
                'pengKerja3' => 'Perusahaan C',
            ]);
        }
    }
}
