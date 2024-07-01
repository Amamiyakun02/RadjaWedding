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
        Schema::create('detail_booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('BookingID');
            $table->unsignedBigInteger('layananID');
            $table->decimal('harga', 10, 2);
            $table->timestamps();

            $table->foreign('BookingID')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreign('layananID')->references('id')->on('layanan')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_booking');
    }
};
