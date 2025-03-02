<?php

namespace Database\Seeders;

use App\Models\Dressing_room;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dressing_roomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //    Group::all()->each(function ($group) {
    //        Dressing_room::factory()->create([
    //            'group_id' => $group->id
    //        ]);
    //    });

        Dressing_room::factory(10)->create();
    }
}
