<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    protected $primaryKey = 'invID';

    protected $fillable = [ 
        'user_ID',
        'invName', 
        'invDesc',
        'invQuant',
        'invCategory'
    ];

    public function user(){
        return $this->belongsTo(User::class, "userID");
    }
}
