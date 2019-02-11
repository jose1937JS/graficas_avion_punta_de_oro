<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'quantity', 'price', 'category_id'];

    public function sale()
    {
    	return $this->hasMany(Sale::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
