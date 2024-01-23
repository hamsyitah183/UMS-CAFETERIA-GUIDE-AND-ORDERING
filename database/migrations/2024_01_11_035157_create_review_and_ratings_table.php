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
        Schema::create('review_and_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->references('id')->on('users')->nullable();
            $table->foreignId('place_id')->references('id')->on('food_options')->onDelete('cascade');
            $table->integer('rate');
            $table->string('name');
            $table->text('message');
            // $table->enum('type', ['customer', 'guest']);s
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_and_ratings');
    }
};
