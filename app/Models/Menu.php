<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('place_name', 'like' , '%' . $filters['search']. '%');
        // }

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->whereRaw('lower(name) like ?', ['%' . strtolower($search) . '%'])
                    ->orWhere('name', 'like', '%' . $search . '%');
                    
            });

        
        });

       
       

        // $query->when($filters['search'])
    }

    public function foodOption()
    {
        return $this->belongsTo(FoodOption::class, 'place_id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_id');

    }

    public function orderLine()
    {
        return $this->hasMany(OrderLine::class, 'product_id');
    }

    
}
