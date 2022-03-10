<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    function getAllProducts(){
        $allProducts = Product::all();

        return view('allProducts', compact('allProducts'));
    }

    function getProduct($product_id){
        $product = Product::findOrFail($product_id);

        return view('product', compact('product'));
    }
}

