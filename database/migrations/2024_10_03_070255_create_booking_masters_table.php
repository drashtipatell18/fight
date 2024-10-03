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
        Schema::create('booking_masters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('journey_id')->constrained('journey_masters');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->decimal('paid_amount', 10, 2);
            $table->date('booking_date');
            $table->time('booking_time');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_masters');
    }
};
