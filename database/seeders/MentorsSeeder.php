<?php

namespace Database\Seeders;

use App\Models\Mentors;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MentorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mentors::factory()->count(15)->create();

    }
}
