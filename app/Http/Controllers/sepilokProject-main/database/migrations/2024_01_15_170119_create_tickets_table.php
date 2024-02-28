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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('ticketID');
            $table->foreignId('booking_ID')->constrained('bookings', 'booking_ID');
            $table->integer('ticketAdult_M')->nullable();
            $table->integer('ticketChildren_M')->nullable();
            $table->integer('ticketAdult_Non')->nullable();
            $table->integer('ticketChildren_Non')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
