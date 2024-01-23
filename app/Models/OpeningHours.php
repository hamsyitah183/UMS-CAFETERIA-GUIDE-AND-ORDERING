<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningHours extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function foodOption()
    {
        return $this->belongsTo(FoodOption::class, 'foodOption_id');
    }

}
