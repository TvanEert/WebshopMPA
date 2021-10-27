<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_product';

    public function product(){
        return $this->belongsToMany('App\product', 'product_id', 'id');
    }
}
