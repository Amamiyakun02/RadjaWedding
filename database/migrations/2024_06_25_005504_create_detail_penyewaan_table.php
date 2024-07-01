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
        Schema::create('detail_penyewaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('RentalID');
            $table->unsignedBigInteger('barangID');
            $table->integer('Quantity');
            $table->decimal('harga', 10, 2);
            $table->timestamps();

            $table->foreign('RentalID')->references('id')->on('penyewaan')->onDelete('cascade');
            $table->foreign('barangID')->references('id')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penyewaan');
    }
};
