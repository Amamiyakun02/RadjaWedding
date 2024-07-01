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
            $table->unsignedBigInteger('rentalID');
            $table->unsignedBigInteger('detailbookingID');
            $table->date('tanggal_pembayaran');
            $table->decimal('jumlah', 10, 2);
            $table->enum('metode_pembayaran', ['tunai', 'kartu_kredit', 'transfer_bank']);
            $table->enum('status', ['dibayar', 'belum_dibayar'])->default('belum_dibayar');
            $table->timestamps();

            $table->foreign('rentalID')->references('id')->on('penyewaan')->onDelete('cascade');
            $table->foreign('detailbookingID')->references('id')->on('detail_booking')->onDelete('cascade');
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
