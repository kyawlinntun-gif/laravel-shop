<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function categories() {
        return $this->hasMany(Category::class, 'admin_id', 'id');
    }

    public function products() {
        return $this->hasMany(Product::class, 'admin_id', 'id');
    }
}
