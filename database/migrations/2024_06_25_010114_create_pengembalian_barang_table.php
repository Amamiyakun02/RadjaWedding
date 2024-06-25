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
        Schema::create('pengembalian_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penyewaanID');
            $table->unsignedBigInteger('barangID');
            $table->date('ReturnDate');
            $table->enum('Condition', ['good', 'damaged', 'lost'])->default('good');
            $table->text('Notes')->nullable();
            $table->timestamps();

            $table->foreign('penyewaanID')->references('id')->on('penyewaan')->onDelete('cascade');
            $table->foreign('barangID')->references('id')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian_barang');
    }
};
