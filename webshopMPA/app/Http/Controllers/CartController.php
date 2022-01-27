<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{
    public function getAllProductsFromCart(Request $request){
        $cart = new Cart($request);
        dd($cart);
    }

    public function addProductToCart(Request $request, $product_id){
        $product = app(ProductController::class)->getProductWithoutCategory($product_id);
        $cart = new Cart($request);
        $cart->addToCart($product, $product_id);

        return redirect()->route('cart');
    }

    public function removeProductFromCart(Request $request, $product_id){
        $cart = new Cart($request);
        $cart->removeAllFromCart($product_id);

        return redirect()->route('cart');
    }

    public function removeOneProductFromCart(){

    }
}
