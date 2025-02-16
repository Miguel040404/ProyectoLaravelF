<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type_of_costume>
 */
class Type_of_costumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_of_company' => $this->faker->company(),
            'make-up' => $this->faker->boolean(),
            'number_of_costumes' => $this->faker->numberBetween(12, 20),
            'group_id' => \App\Models\Group::factory(),
        ];
    }
}
