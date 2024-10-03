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
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('booking_masters');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('dob');
            $table->string('country');
            $table->string('mobile_no');
            $table->string('alternate_mobile_no');
            $table->string('email1');
            $table->string('email2');
            $table->string('gender');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_details');
    }
};
