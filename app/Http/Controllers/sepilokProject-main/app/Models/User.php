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
    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
    ];

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

    //relationship to Contact
    public function contact(){
        return $this->hasMany(Contact::class, 'user_ID');
    }

    public function inventory(){
        return $this->hasMany(Inventory::class, 'user_ID');
    }

    public function staff(){
        return $this->hasOne(Staff::class, 'user_ID');
    }

    public function task(){
        return $this->hasMany(Task::class, "user_ID");
    }

    public function locker(){
        return $this->hasMany(Locker::class, "user_ID");
    }
    public function booking(){
        return $this->hasMany(Booking::class, "user_ID");
    }
    public function announcement(){
        return $this->hasMany(Announcement::class, "user_ID");
    }

}
