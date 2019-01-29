<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $table    = 'categories';
    protected $fillable = ['category'];

    public function category()
    {
    	return $this->hasMany(Product::Class);
    }
}
