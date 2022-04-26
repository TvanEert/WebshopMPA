<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories(){
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'order_product')->withPivot('ordered_amount');
    }
}
