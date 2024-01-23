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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->references('id')->on('shopping_carts')->onDelete('cascade');
            $table->foreignId('product_id')->references('id')->on('menus')->onDelete('cascade');
            $table->string('name');
            $table->string('price');
            $table->string('quantity')->nullable();
            $table->text('info')->nullable();

            // $table->string();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
