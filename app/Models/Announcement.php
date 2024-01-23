<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Announcement extends Model
{
    use Sluggable, HasFactory;

    protected $guarded = ['id'];

    public function admin() {
        return $this->belongsTo(User::class,'user_id')->where('role','admin');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // admin      announcement
    // 1               byk
    // 1                 1 

    public function scopeFilter($query, array $filters) {

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search. '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
        });
        
    }
}
