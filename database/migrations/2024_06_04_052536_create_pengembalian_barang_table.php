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
            $table->unsignedBigInteger('id_pemesanan');
            $table->unsignedBigInteger('id_barang');
            $table->string('status_pengembalian', 50);
            $table->date('tanggal_pengembalian');
            $table->timestamps();

            $table->foreign('id_pemesanan')->references('id')->on('pemesanan')->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('barang')->onDelete('cascade');
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
