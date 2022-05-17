<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    function getAllProducts(){
        $allProducts = Product::all();

        return view('allProducts', ['allProducts' => $allProducts]);
    }

    function getProduct(Product $product){
        return view('product', ['product' => $product]);
    }
} 

