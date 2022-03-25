<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryContoller extends Controller
{
    function getAllCategories(){
        $allCategories = Category::all();
        
        return view('home', ['allCategories' => $allCategories]);
    }

    function getAllProductsFromCategory($category_id){
        $category = Category::findOrFail($category_id);        

        return view('categoryProduct', ['category' => $category]);
    }
}