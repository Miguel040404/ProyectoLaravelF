<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type_group', ['chirigota', 'cuarteto', 'coro', 'comparsa']);
            $table->integer('number_of_people');
            $table->string('place');
            $table->unsignedBigInteger('author_id'); 
            $table->foreign('author_id')->references('id')->on('authors');

            $table->unsignedBigInteger('dressing_room_id');
            $table->foreign('dressing_room_id')->references('id')->on('dressing_rooms');

            $table->unsignedBigInteger('performances_id');
            $table->foreign('performances_id')->references('id')->on('performen');

            $table->unsignedBigInteger('props_id');
            $table->foreign('props_id')->references('id')->on('props');

            $table->unsignedBigInteger('type_of_costumes_id');
            $table->foreign('type_of_costumes_id')->references('id')->on('type_of_costumes');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};



// <?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('groups', function (Blueprint $table) {
//             $table->id();
//             $table->string('name');
//             $table->enum('type_group', ['chirigota', 'cuarteto', 'coro', 'comparsa']);
//             $table->integer('number_of_people');
//             $table->string('place');
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('groups');
//     }
// };