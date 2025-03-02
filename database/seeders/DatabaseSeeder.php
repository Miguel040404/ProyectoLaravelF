<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Dressing_room;
use App\Models\Group;
use App\Models\Performan;
use App\Models\Prop;
use App\Models\Type_of_costume;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mockery\Matcher\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Group::factory(10)->create()->each(function (Group $group) {
        //    Performan::factory()->create(['group_id' => $group->id]);
        //    Dressing_room::factory()->create(['group_id' => $group->id]);
        //    Author::factory()->create(['group_id' => $group->id]);
        //    Type_of_costume::factory()->create(['group_id' => $group->id]);
        //    Prop::factory()->create(['group_id' => $group->id]);
        // });
        
        $this->call(UserSeeder::class);
        
        $this->call(AuthorSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(Dressing_roomSeeder::class);
        $this->call(Type_of_costumeSeeder::class);
        $this->call(PropSeeder::class);
        $this->call(PerformanSeeder::class);
    }
}
