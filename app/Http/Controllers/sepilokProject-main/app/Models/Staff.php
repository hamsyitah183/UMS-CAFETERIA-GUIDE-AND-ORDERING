<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $primaryKey = 'staffID';

    protected $fillable = [ 
        'user_ID',
        'staffName', 
        'staffDOB',
        'staffGender',
        'staffRace',
        'staffContact',
        'staffAddress',
        'staffPosition',
        'staffHireDate'
    ];

    public function user(){
        return $this->belongsTo(User::class, "userID");
    }

    public function task(){
        return $this->hasMany(Task::class, "staffID");
    }

    public function check(){
        return $this->hasMany(Check::class, 'staffID');
    }
}
