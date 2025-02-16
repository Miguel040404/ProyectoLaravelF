<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Performan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerformanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::all()->each(function ($group) {
            Performan::factory()->create([
                'group_id' => $group->id 
            ]);
        });
    }
}
