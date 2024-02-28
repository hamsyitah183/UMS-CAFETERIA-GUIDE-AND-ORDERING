<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    protected $table = 'checks';

    protected $primaryKey = 'checkID';

    protected $fillable = [ 
        'user_ID',
        'checkIn', 
        'checkOut',
        'checkDate'
    ];

    public function staff(){
        
        return $this->belongsTo(Staff::class, "staffID");
    }

}
