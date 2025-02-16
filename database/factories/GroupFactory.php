<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'type_group' => fake()->randomElement(['chirigota', 'cuarteto', 'coro', 'comparsa']),
            'number_of_people' => $this->faker->numberBetween(5, 20),
            'place' => $this->faker->city(),
        ];
    }
}
