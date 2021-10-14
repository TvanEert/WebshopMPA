<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function getAllProducts(){
        $allProducts = Product::all();

        return view('product', compact('allProducts'));
    }
}
