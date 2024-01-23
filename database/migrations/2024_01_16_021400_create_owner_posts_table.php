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
        Schema::create('owner_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')->references('id')->on('food_options')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->enum('category', ['Promo', 'News']);
            $table->string('title');
            $table->text('content');
            $table->enum('status', ['Ongoing', 'Finish']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner_posts');
    }
};
