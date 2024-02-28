<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $primaryKey = 'booking_ID';
    protected $fillable = [
        'user_ID',
        'booking_Name', 
        'booking_Contact', 
        'booking_Nationality', 
        'booking_Country', 
        'booking_Adults', 
        'booking_Children', 
        'booking_Date', 
        'booking_Status',
        'availability',
        'totalPrice',
        'time_slot',
        'payment_proof',
        'paymentMethod'
    ];

    public function user(){
        return $this->belongsTo(User::class, "userID");
    }

    public function ticket(){
        return $this->hasMany(Ticket::class, 'ticketID', 'booking_ID');
    }
}
