<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function foodOption() {
        return $this->hasMany(FoodOption::class);
    }
}
