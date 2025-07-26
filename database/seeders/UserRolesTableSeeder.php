<?php

namespace Database\Seeders;

use App\Models\UserRoles;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    // public function run()
    // {
    //     UserRoles::create([
    //         'user_id' => User::first()->id,
    //         'role_id' => Role::where('name', 'Admin')->first()->id,
    //     ]);
    //     UserRoles::create([
    //         'user_id' => User::first()->id,
    //         'role_id' => Role::where('name', 'HRD')->first()->id,
    //     ]);
    //     UserRoles::create([
    //         'user_id' => User::first()->id,
    //         'role_id' => Role::where('name', 'Applicants')->first()->id,
    //     ]);
    //     UserRoles::create([
    //         'user_id' => User::first()->id,
    //         'role_id' => Role::where('name', 'Applicants')->first()->id,
    //     ]);
    // }

    public function run()
    {
        $roleMap = [
            'admin@gelatik.com'     => 'Admin',
            'hrd@gelatik.com'       => 'HRD',
            'ani@gmail.com' => 'Applicants',
            'antok@gmail.com' => 'Applicants',
        ];

        foreach ($roleMap as $email => $roleName) {
            $user = User::where('email', $email)->first();
            $role = Role::where('name', $roleName)->first();

            if ($user && $role) {
                $alreadyExists = UserRoles::where('user_id', $user->id)
                    ->where('role_id', $role->id)
                    ->exists();

                if (!$alreadyExists) {
                    UserRoles::create([
                        'user_id' => $user->id,
                        'role_id' => $role->id,
                    ]);
                    echo "✅ Berhasil assign role $roleName ke $email.\n";
                }
            } else {
                echo "⚠️  User atau Role tidak ditemukan: $email / $roleName\n";
            }
        }

        echo "✅ UserRoleSeeder selesai.\n";
    }
}
