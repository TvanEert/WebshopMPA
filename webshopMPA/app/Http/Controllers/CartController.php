<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{
    public function getAllProductsFromCart(){

    }

    public function addProductToCart($product_id){
        $product = app(ProductController::class)->getProductWithoutCategory($product_id);
        Cart::addToCart($product ,$product_id);
    }

    public function removeProductFromCart(){

    }

    public function changeProductAmountInCart(){

    }
}
