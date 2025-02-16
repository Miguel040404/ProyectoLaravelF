<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Prop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::all()->each(function ($group) {
            Prop::factory()->create([
                'group_id' => $group->id // Relación con Group
            ]);
        });
    }
}
