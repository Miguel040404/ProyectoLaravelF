<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Performan>
 */
class PerformanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_performan' => $this->faker->date(),
            'day_performan' => $this->faker->randomElement(['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo']),
            'stage_performan' => $this->faker->randomElement(['preliminar', 'cuarto', 'semifinal', 'final']),
            // 'group_id' => \App\Models\Group::factory(),
        ];
    }
}
