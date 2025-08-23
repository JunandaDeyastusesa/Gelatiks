<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id'   => Str::ulid(),
            'username' => 'superadmin',
            'email'    => 'superadmin@gelatik.com',
            'password' => Hash::make('123123123'),
        ]);

        User::create([
            'id'   => Str::ulid(),
            'username' => 'admin',
            'email'    => 'admin@gelatik.com',
            'password' => Hash::make('123123123'),
        ]);

         User::create([
            'id'   => Str::ulid(),
            'username' => 'hrd',
            'email'    => 'hrd@gelatik.com',
            'password' => Hash::make('123123123'),
        ]);

        User::create([
            'id'   => Str::ulid(),
            'username' => 'anilestari',
            'email'    => 'ani@gmail.com',
            'password' => Hash::make('123123123'),
        ]);

        User::create([
            'id'   => Str::ulid(),
            'username' => 'antok',
            'email'    => 'antok@gmail.com',
            'password' => Hash::make('123123123'),
        ]);
    }
}
