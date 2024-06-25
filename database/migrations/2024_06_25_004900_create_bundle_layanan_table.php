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
        Schema::create('bundle_layanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('BundleID');
            $table->unsignedBigInteger('layananID');
            $table->timestamps();

            $table->foreign('BundleID')->references('id')->on('bundle_penyewaan')->onDelete('cascade');
            $table->foreign('layananID')->references('id')->on('layanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bundle_layanan');
    }
};
