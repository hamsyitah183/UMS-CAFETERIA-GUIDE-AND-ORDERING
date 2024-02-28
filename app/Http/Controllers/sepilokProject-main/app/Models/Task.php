<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $primaryKey = 'tasksID';

    protected $fillable = [ 
        'user_ID',
        'taskName', 
        'taskDesc',
        'taskDate',
        'taskTime',
        'staffID',
        'taskStatus'
    ];

    public function user(){
        return $this->belongsTo(User::class, "userID");
    }
    public function staff(){
        return $this->belongsTo(Staff::class, "staffID");
    }
}
