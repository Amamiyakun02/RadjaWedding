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
        Schema::create('paket_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paket');
            $table->unsignedBigInteger('id_barang');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_paket')->references('id')->on('paket')->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_barang');
    }
};
