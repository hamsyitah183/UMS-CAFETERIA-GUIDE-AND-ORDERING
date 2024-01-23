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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')->references('id')->on('food_options')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('quantity')->nullable();
            $table->string('pickup_time')->nullable();
            $table->string('total_price')->nullable();
            $table->string('delivery_type')->nullable();

            // $table->string('');
            $table->text('order_notes')->nullable();

            $table->enum('status', ['Pending', 'Processed', 'Cancel', 'Completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
