<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'role',
        'image'
    ];

    protected $with = ['order', 'cart'];

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
    ];

    public function order() {
        return $this->hasMany(Order::class);
    }

    public function cart() {
        return $this->hasMany(Cart::class);
    }
    
    public function scopeFilter($query, array $filter) {
        $query->when($filter['username'] ?? false, function($query, $username) {
            $query->where('name', 'like', '%' . $username . '%');
        });
        $query->when($filter['role'] ?? false, function($query, $role) {
            $query->where('role', 'like', '%' . $role . '%');
        });
        return $query;
    }
}
