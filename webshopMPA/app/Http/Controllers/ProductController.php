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
        $product = Product::where('id', $product_id)->get();
        $categories = Product::find($product_id)->categories()->get();

        return view('product', compact('product', 'categories'));
    }
}
