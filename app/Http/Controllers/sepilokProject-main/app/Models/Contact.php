<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $primaryKey = 'contactID';

    protected $fillable = [ 
        'user_ID',
        'contactMessage', 
        'contactType',
        'contactCategory'
    ];

    //relationship to User
    public function user(){
        return $this->belongsTo(User::class, "userID");
    }
}
