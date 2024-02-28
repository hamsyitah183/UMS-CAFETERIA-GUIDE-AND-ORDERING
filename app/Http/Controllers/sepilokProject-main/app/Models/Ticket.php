<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $primaryKey = 'ticketID';

    protected $fillable = [ 
        'booking_ID',
        'price_AdultM', 
        'price_ChildM',
        'price_AdultNon',
        'price_ChildNon'
    ];

    public function booking(){
        return $this->belongsTo(Booking::class, "booking_ID");
    }
}
