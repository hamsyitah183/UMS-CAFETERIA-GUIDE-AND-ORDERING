<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function announcement()
    {
        return $this->hasMany(Announcement::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function foodOption()
    {
        return $this->hasOne(FoodOption::class, 'owner_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'user_id');
    }

    public function shoppingCart()
    {
        return $this->hasOne(ShoppingCart::class, 'user_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    
}

