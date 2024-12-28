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
      Schema::create('trips', function (Blueprint $table) {
        $table->id();
        $table->foreignId('bus_id')->constrained('buses')->onDelete('cascade');
        $table->foreignId('start_station_id')->constrained('stations')->onDelete('cascade');
        $table->foreignId('end_station_id')->constrained('stations')->onDelete('cascade');
        $table->integer('available_seats');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
