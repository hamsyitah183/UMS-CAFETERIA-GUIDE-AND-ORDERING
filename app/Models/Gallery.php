<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function foodOption()
    {
        return $this->belongsTo(FoodOption::class,  'place_id');
    }
}
