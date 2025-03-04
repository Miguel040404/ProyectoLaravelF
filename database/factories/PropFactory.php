<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prop>
 */
class PropFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number_of_extra' =>$this->faker->numberBetween(1, 10),
            'lights' => $this->faker->boolean(),
            'background' => $this->faker->boolean(),
            'confetti' => $this->faker->boolean(),
            // 'group_id' => \App\Models\Group::factory(),
        ];
    }
}
