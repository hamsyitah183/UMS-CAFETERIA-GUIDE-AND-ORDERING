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
        Schema::create('lockers', function (Blueprint $table) {
            $table->id('lockerID');
            $table->foreignId('user_ID')->constrained('users', 'id');
            $table->integer('lockerNumber');
            $table->string('occupant');
            $table->string('lockerContact');
            $table->dateTime('lockerStart');
            $table->string('lockerStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lockers');
    }
};
