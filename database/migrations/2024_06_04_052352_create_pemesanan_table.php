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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_layanan');
            $table->unsignedBigInteger('id_paket');
            $table->date('tanggal_pesan');
            $table->date('tanggal_acara');
            $table->decimal('total_harga', 10, 2);
            $table->string('status', 50);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_layanan')->references('id')->on('layanan')->onDelete('cascade');
            $table->foreign('id_paket')->references('id')->on('paket')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
