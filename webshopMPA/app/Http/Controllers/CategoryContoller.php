<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryContoller extends Controller
{
    function getAllCategories(){
        $allCategories = Category::all();
        
        return view('home', compact('allCategories'));
    }

    function getAllProductsFromCategory(){
        $categoryProducts;

        return view('categoryProduct', compact('categoryProducts'));
    }
}