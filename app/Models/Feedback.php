<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $guarded = ['id'];
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reply()
    {
        return $this->hasMany(Reply::class, 'feedback_id');
    }
}
