<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewAndRating extends Model
{
    protected $guarded = ['id'];
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foodOption()
    {
        return $this->belongsTo(FoodOption::class, 'place_id');
    }
}
