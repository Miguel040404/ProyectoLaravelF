<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dressing_room>
 */
class Dressing_roomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number_of_dressing_rooms' => $this->faker->unique()->numberBetween(1, 20),
            'capacity_of_dressing_rooms' => $this->faker->numberBetween(12, 20),
            // 'group_id' => \App\Models\Group::factory(),
        ];
    }
}
