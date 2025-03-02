<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Type_of_costume;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Type_of_costumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Group::all()->each(function ($group) {
        //     Type_of_costume::factory()->create([
        //         'group_id' => $group->id 
        //     ]);
        // });

        Type_of_costume::factory(10)->create();
    }
}
