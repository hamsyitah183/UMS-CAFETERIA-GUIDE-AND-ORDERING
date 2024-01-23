<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function cart()
    {
        return $this->hasMany(Cart::class, 'cart_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function foodOption()
    {
        return $this->belongsTo(FoodOption::class,'place_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'shopping_cart_id');
    }
}
