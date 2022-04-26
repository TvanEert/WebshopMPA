<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function products(){
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('ordered_amount');
    }
}
