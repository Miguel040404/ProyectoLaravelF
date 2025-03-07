<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dressing_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_dressing_rooms');
            $table->integer('capacity_of_dressing_rooms');
            // $table->foreignId('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dressing_rooms');
    }
};
