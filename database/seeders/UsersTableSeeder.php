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
            'username' => 'budisantoso',
            'email'    => 'budi@example.com',
            'password' => Hash::make('123123123'),
        ]);

        User::create([
            'id'   => Str::ulid(),
            'username' => 'anilestari',
            'email'    => 'ani@example.com',
            'password' => Hash::make('123123123'),
        ]);
    }
}
