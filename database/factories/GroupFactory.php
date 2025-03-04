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
            'number_of_people' => $this->faker->numberBetween(5, 15),
            'place' => $this->faker->city(),
            'author_id' => $this->faker->numberBetween(1, 10),
            'dressing_room_id' => $this->faker->numberBetween(1, 10),
            'performances_id' => $this->faker->numberBetween(1, 10),
            'props_id' => $this->faker->numberBetween(1, 10),
            'type_of_costumes_id' => 1,
        ];
    }
}


// <?php

// namespace Database\Factories;

// use Illuminate\Database\Eloquent\Factories\Factory;

// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
//  */
// class GroupFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         return [
//             'name' => fake()->company(),
//             'type_group' => fake()->randomElement(['chirigota', 'cuarteto', 'coro', 'comparsa']),
//             'number_of_people' => $this->faker->numberBetween(5, 20),
//             'place' => $this->faker->city(),
//             // 'author_id' => \App\Models\Author::factory(),
//         ];
//     }
// }