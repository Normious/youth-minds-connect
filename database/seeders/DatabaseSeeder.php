<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Events;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'superadmin']);

        // Create admin user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'email@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Assign admin role to user
        $user->assignRole('admin');
    }
}
