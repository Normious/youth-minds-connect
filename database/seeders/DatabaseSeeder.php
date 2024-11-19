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

        // $role = Role::create(['name' => 'admin']);
        // $roleone = Role::create(['name' => 'user']);
        // $roletwo = Role::create(['name' => 'superadmin']);

        // $user = User::create([
            // 'name'=> 'grey',
            // 'email' => 'admin@bnmw.com',
            // 'password' => Hash::make('password'),
        // ]);

        // $user->assignRole($roletwo);

        // $user = Events::create([
        //     'name' => 'National',
        //     'description' => '',
        //     'date_from' => Carbon::now(),
        //     'to' => Carbon::now(),

        //   ]);
        // //   $user->assignRole($roletwo);

        //       // Generate 20 random events
        //       Events::factory()->count(20)->create();
        // Define a random number of new events to insert (between 10 and 15)
        // $numRecords = rand(10, 15);

        // for ($i = 0; $i < $numRecords; $i++) {
        //     // Generate random start date
        //     $startDate = Carbon::now()->addDays(rand(0, 365));

        //     // Generate random end date, between 1 and 5 days after start date
        //     $endDate = (clone $startDate)->addDays(rand(1, 5));

        //     // Insert a new event record
        //     Events::create([
        //         'name' => 'Event ' . Str::random(5), // Random name
        //         'description' => 'Description of ' . Str::random(8), // Random description
        //         'date_from' => $startDate->toDateString(), // Start date
        //         'date_to' => $endDate->toDateString(),     // End date
        //     ]);
        // }

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([
        //     RolesAndUsersSeeder::class,
        //     // Add other seeders here
        // ]);

        $user = User::create([
            'name' => 'Test User',
            'email'=>'email@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('admin');
    }
}
