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
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')->references('id')->on('food_options')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('pickup_time')->nullable();
            $table->text('order_notes')->nullable();
            $table->enum('status',['complete', 'not_complete']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_carts');
    }
};
