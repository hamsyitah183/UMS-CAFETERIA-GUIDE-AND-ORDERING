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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('tasksID');
            $table->foreignId('user_ID')->constrained('users', 'id');
            $table->string('taskName');
            $table->string('taskDesc');
            $table->date('taskDate');
            $table->time('taskTime');

            // Change 'taskAssign' to 'staffID' and create a foreign key constraint
            $table->foreignId('staffID')->nullable()->constrained('staffs', 'staffID');            
            $table->string('taskStatus');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
