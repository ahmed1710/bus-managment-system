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
      Schema::create('seats', function (Blueprint $table) {
          $table->id();
          $table->foreignId('trip_id')->constrained('trips')->onDelete('cascade');
          $table->integer('seat_number');
          $table->boolean('is_booked')->default(false);
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
