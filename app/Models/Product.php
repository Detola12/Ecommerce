<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','category_id','price','slug','description','image'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
