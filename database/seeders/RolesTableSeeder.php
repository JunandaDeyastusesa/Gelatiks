<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'id'   => Str::ulid(),
            'no'   => 1,
            'name' => 'Admin',
        ]);


        Role::create([
            'id'   => Str::ulid(),
            'no'   => 2,
            'name' => 'Applicants',
        ]);

        Role::create([
            'id'   => Str::ulid(),
            'no'   => 3,
            'name' => 'HRD',
        ]);

        Role::create([
            'id'   => Str::ulid(),
            'no'   => 4,
            'name' => 'Super Admin',
        ]);
    }
}
