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
        Schema::create('places_to_roams', function (Blueprint $table) {
            $table->id();
            $table->string('image');   
            $table->string('title');   
            $table->string('description');   
            $table->string('location');    
            $table->string('exploration_time');    
            $table->foreignId('popular_place_id')->constrained('popular_places'); // {{ edit_1 }}
            $table->timestamps();
            $table->softDeletes(); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places_to_roams');
    }
};
