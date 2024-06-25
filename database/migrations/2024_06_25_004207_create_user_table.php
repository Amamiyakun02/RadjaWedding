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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 100);
            $table->string('Email', 100)->unique();
            $table->string('Phone', 15)->nullable();
            $table->text('Address')->nullable();
            $table->enum('UserType', ['customer', 'admin'])->default('customer');
            $table->enum('Gender', ['male', 'female'])->nullable();
            $table->date('DateOfBirth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
