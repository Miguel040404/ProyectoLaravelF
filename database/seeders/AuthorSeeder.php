<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Group::all()->each(function ($group) {
        //     Author::factory()->create([
        //         'group_id' => $group->id
        //     ]);
        // });

        Author::factory(10)->create();
    }
}
