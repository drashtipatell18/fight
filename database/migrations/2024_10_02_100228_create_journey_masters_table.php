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
        Schema::create('journey_masters', function (Blueprint $table) {
            $table->id();
            $table->string('from_city');
            $table->string('to_city');
            $table->foreignId('plane_id')->constrained('plane_masters');
            $table->integer('price');
            $table->date('date');
            $table->string('departure_datetime');
            $table->string('arrival_datetime');
            $table->string('total_stop');
            $table->string('stop_name');
            $table->string('stop_time');
            $table->string('cabin_bag');
            $table->string('checkin_bag');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journey_masters');
    }
};
