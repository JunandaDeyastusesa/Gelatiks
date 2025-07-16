<?php

namespace Database\Seeders;

use App\Models\UserRoles;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    public function run()
    {
        UserRoles::create([
            'user_id' => User::first()->id,
            'role_id' => Role::where('name', 'Admin')->first()->id,
        ]);
         UserRoles::create([
            'user_id' => User::first()->id,
            'role_id' => Role::where('name', 'Applicants')->first()->id,
        ]);
    }
}

