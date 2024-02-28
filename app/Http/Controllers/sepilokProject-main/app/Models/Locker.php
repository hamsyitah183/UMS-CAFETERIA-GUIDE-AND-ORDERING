<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;

    protected $table = 'lockers';

    protected $primaryKey = 'lockerID';

    protected $fillable = [ 
        'user_ID',
        'lockerNumber', 
        'occupant',
        'lockerContact',
        'lockerStart',
        'lockerStatus'
    ];

    public function user(){
        return $this->belongsTo(User::class, "userID");
    }
}
