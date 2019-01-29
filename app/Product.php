<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'quantity', 'price', 'category_id'];

    public function sale()
    {
    	return $this->hasOne(Sale::class);
    }
}
