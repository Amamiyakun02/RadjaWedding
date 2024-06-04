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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemesanan');
            $table->date('tanggal_bayar');
            $table->decimal('jumlah', 10, 2);
            $table->string('metode', 50);
            $table->string('status', 50);
            $table->timestamps();

            $table->foreign('id_pemesanan')->references('id')->on('pemesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
