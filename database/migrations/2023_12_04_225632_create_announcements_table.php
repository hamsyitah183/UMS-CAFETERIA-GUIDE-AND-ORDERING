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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id')->references('id')->on('users')->where('role', 'admin');
            $table->string('slug')->nullable();
            $table->text('excerpt')->nullable();
            $table->datetime('start');
            $table->datetime('end');
            $table->text('body')->nullable();
            $table->text('place')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
