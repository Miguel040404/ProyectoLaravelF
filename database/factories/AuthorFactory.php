<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_of_author' => $this->faker->name(),
            'number_of_authors' => $this->faker->numberBetween(1, 5),
            // 'group_id' => \App\Models\Group::factory(),
        ];
    }
}

// <?php

// namespace Database\Factories;

// use Illuminate\Database\Eloquent\Factories\Factory;

// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
//  */
// class AuthorFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         return [
//             'name_of_author' => $this->faker->name(),
//             'number_of_authors' => $this->faker->numberBetween(1, 5),
//             'group_id' => \App\Models\Group::factory(),
//         ];
//     }
// }