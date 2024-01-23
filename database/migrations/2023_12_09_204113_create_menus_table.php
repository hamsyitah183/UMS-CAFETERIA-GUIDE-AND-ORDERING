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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')->references('id')->on('food_options')->onDelete('cascade');
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description');
            $table->float('price');
            $table->string('category');
            $table->enum('status', ['in_stock', 'out_of_stock'])->default('in_stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
