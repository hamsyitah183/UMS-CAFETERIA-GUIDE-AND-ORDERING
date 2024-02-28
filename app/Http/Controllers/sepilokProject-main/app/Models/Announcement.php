<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table = 'announcements';

    protected $primaryKey = 'annID';
    protected $fillable = [
        'user_ID',
        'annTitle', 
        'annDesc', 
        'annImg', 
        'annStatus'
    ];

    public function user(){
        return $this->belongsTo(User::class, "userID");
    }

    
}
