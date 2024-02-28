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
            $table->id('annID');
            $table->foreignId('user_ID')->constrained('users', 'id');
            $table->string('annTitle');
            $table->mediumText('annDesc')->nullable();
            $table->string('annImg')->nullable();
            $table->tinyInteger('annStatus')->default('0')->comment('1=hidden, 0=visible');
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
