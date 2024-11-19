<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Carbon;

class RolesAndUsersSeeder extends Seeder
{
    public function run()
    {
        // Create roles if they do not already exist
        $roles = ['admin', 'user', 'superadmin'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Retrieve the roles
        $roleAdmin = Role::where('name', 'admin')->first();
        $roleUser = Role::where('name', 'user')->first();
        $roleSuperadmin = Role::where('name', 'superadmin')->first();

        // Create user
        $user = User::updateOrCreate(
            ['email' => 'admin@bnmw.com'], // Unique constraint (email)
            [
                'firstname' => 'youth',
                'surname' => 'minds',
                'number' => '265999',
                'admin' => 1,
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('Nbm100%'),
            ]
        );

        // Assign role to user
        if ($roleSuperadmin) {
            $user->assignRole($roleSuperadmin);
        }
    }
}
