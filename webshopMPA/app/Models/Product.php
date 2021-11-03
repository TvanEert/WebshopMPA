<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories(){
        return $this->belongsToMany(Category::class, 'category_product');
    }

    protected function getOneProduct($product_id){
        return $this->where('id', $product_id)->get();
    }

    protected function getProductCategories($product_id){
        return $this->find($product_id)->categories()->get();
    }
}
