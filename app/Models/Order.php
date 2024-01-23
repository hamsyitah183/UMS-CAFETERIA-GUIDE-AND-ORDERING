<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarderd = ['id'];

    protected $fillable = [
        'place_id',
        'user_id',
        'quantity',
        'pickup_time',
        'total_price',
        'delivery_type',
        'order_notes',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function payment()
    {
        return $this->hasOne(UserPayment::class, 'order_id');
    }

    public function foodOption()
    {
        return $this->belongsTo(FoodOption::class, 'place_id');
    }

    public function orderLine()
    {
        return $this->hasMany(OrderLine::class, 'order_id');
    }

    
}
