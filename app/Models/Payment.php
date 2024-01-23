<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function foodOption()
    {
        return $this->belongsTo(FoodOption::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
