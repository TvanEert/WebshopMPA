<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Cart;

class CartController extends Controller
{
    public function getAllProductsFromCart(Request $request){
        $cart = new Cart($request);

        $cartItems = $cart->cartItems;
        $totalQty = $cart->totalQty;
        $totalPrice = $cart->totalPrice;
        
        return view("cart", compact('cartItems', 'totalQty', 'totalPrice'));
    }

    public function addProductToCart(Request $request, Product $product){
        $cart = new Cart($request);
        $cart->addToCart($product);

        return redirect()->route('cart');
    }

    public function removeProductFromCart(Request $request, $product_id){
        $cart = new Cart($request);
        $cart->removeAllFromCart($product_id);

        return redirect()->route('cart');
    }

    public function reduceProductByOneInCart(){
        $cart = new Cart($request);
        $cart->reduceByOneInCart($request);
        
        return redirect()->route('cart');
    }
}
