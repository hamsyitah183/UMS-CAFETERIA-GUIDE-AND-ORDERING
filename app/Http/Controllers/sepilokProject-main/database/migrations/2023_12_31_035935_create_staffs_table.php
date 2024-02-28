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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id('staffID');
            $table->foreignId('user_ID')->constrained('users', 'id');
            $table->string('staffName');
            $table->string('staffDOB');
            $table->string('staffGender');
            $table->string('staffRace');  
            $table->string('staffContact'); 
            $table->string('staffAddress');  
            $table->string('staffPosition');
            $table->string('staffHireDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
