<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodOption extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    

    // scope
    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('place_name', 'like' , '%' . $filters['search']. '%');
        // }

        // $query->when($filters['search'] ?? false, function($query, $search) {
        //         return $query->where('place_name', 'like' , '%' . $search. '%');

        // });
        // $query->when($filters['search'] ?? false, function ($query, $search) {
        //     return $query->where(function ($query) use ($search) {
        //         $query->where('place_name', 'like', '%' . $search . '%')
        //         ->orWhere('type', 'like', '%' . $search . '%')
        //         ->orWhereHas('owner', function ($query) use ($search) {
        //             $query->where('addressLine1', 'like', '%' . $search . '%');
                        
        //         });
                    
        //     });
        // });
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->whereRaw('lower(place_name) like ?', ['%' . strtolower($search) . '%'])
                    ->orWhere('type', 'like', '%' . $search . '%')
                    ->orWhereHas('owner', function ($query) use ($search) {
                        $query->whereRaw('lower(addressLine1) like ?', ['%' . strtolower($search) . '%'])
                            ->orWhereRaw('lower(addressLine2) like ?', ['%' . strtolower($search) . '%'])
                            ->orWhereRaw('lower(addressLine3) like ?', ['%' . strtolower($search) . '%']);

                    });
                    // ->orWhereHas('menu', function ($query) use ($search) {
                    //     $query->whereRaw('lower(name) like ?', ['%' . strtolower($search) . '%'])
                    //         ->orWhereRaw('lower(description) like ?', ['%' . strtolower($search) . '%'])
                    //         ->orWhereRaw('lower(category) like ?', ['%' . strtolower($search) . '%']);

                    // });
            });
        });


        
    }
    public function placeType()
    {
        return $this->belongsTo(PlaceType::class);
    }

    public function openingHour()
    {
        return $this->hasMany(OpeningHours::class, 'foodOption_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id')->where('role', 'owner');
    }
    
    public function menu()
    {
        return $this->hasMany(Menu::class, 'place_id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'place_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'place_id');
    }

    public function map()
    {
        return $this->hasOne(Map::class, 'place_id');
    }

    public function reviewAndRating()
    {
        return $this->hasMany(ReviewAndRating::class, 'place_id');
    }

    public function shoppingCart()
    {
        return $this->hasMany(ShoppingCart::class, 'place_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'place_id');
    }
    
    public function post()
    {
        return $this->hasMany(OwnerPost::class, 'place_id');
    }
}
