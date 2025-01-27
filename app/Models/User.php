<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin;
use App\Models\ShoppingCart;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
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
        'address',
        'phone_number',
        'is_admin',
        'api_token'
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
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }

    public function shoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class, 'user_id', 'id');
    }

    public function productsInCart()
    {
        return $this->hasManyThrough(Product::class, ShoppingCart::class, 'user_id', 'id', 'id', 'product_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
}
