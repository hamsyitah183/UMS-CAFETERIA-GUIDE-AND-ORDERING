<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $guraded = ['id'];

    public function foodOption()
    {
        return $this->hasOne(foodOption::class);
    }

}
