<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['quantity', 'total_price', 'product_id'];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
