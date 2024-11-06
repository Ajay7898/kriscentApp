<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{User,Order};

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name','description'];

    public function users()
    {
        return $this->belongsToMany(User::class,'product_user');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
