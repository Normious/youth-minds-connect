<?php

namespace Database\Factories;

use App\Models\Events;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Events>
 */
class EventsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     */

     protected $model = Events::class;
    public function definition(): array
    {
        $startTime = $this->faker->time();
        $endTime = $this->faker->time('H:i', strtotime($startTime) + rand(3600, 14400)); // Between 1-4 hours after start

        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'date_from' => $startTime,
            'date_to' => $endTime,
        ];
    }
}
