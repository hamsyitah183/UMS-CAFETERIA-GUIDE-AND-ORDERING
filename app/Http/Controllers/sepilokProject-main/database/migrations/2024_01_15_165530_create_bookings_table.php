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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_ID');
            $table->foreignId('user_ID')->constrained('users', 'id');
            $table->string('booking_Contact');
            $table->string('booking_Name');
            $table->string('booking_Nationality');
            $table->string('booking_Country');
            $table->integer('booking_Adults');
            $table->integer('booking_Children');
            $table->date('booking_Date');
            $table->integer('availability');
            $table->string('time_slot');
            $table->integer('totalPrice')->nullable();
            $table->string('booking_Status')->default('unconfirmed');
            $table->string('paymentMethod')->nullable();
            $table->string('payment_proof')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
