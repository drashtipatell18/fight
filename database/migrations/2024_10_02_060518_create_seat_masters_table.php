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
        Schema::create('seat_masters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plane_id')->constrained('plane_masters');
            $table->string('seat_number');
            $table->string('seat_type');
            $table->string('is_w');
            $table->string('seat_status');
            $table->string('seat_price');
            $table->string('price_incrementer');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seat_masters');
    }
};
