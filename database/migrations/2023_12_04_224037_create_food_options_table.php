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
        Schema::create('food_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->unique()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('type')->references('id')->on('place_types');
            $table->string('place_name');
            $table->string('place_slug')->unique();
            $table->string('image');
            $table->string('description');
            $table->string('phoneNumber')->nullable();
            $table->text('addressLine1')->nullable();
            $table->string('QR_CODE')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_options');
    }
};
