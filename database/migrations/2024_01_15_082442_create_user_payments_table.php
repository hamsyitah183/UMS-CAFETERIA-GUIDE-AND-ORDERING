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
        Schema::create('user_payments', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('place_id')->references('id')->on('food_options')->onDelete('cascade');
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('image');
            $table->string('payment_ref_no');
            $table->string('total_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_payments');
    }
};
