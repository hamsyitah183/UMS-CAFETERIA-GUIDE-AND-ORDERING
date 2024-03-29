<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarderd = ['id'];

    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'cart_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'product_id');
    }
}
