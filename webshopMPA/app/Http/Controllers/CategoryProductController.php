<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class CategoryProductController extends Controller
{
    public function getProductsWhereCategory($categoryId){
        $categoryProducts = CategoryProduct::all()->where('category_id', $categoryId);

        return view('categoryProduct', compact('categoryProducts'));
    }
}
