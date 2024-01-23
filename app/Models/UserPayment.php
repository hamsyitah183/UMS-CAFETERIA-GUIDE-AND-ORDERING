<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shopping_cart_id');
    }
}
