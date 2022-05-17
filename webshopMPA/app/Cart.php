<?php

namespace App;

use Illuminate\Http\Request;

class Cart
{
    public $cartItems = [];
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct(Request $request){
        $oldcart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        if($oldcart){
            $this->cartItems = $oldcart->cartItems;
            $this->totalQty = $oldcart->totalQty;
            $this->totalPrice = $oldcart->totalPrice;
        }  

        $this->saveToSession($request);
    }

    /**
     * Save the cart object to the session if there is more then 0 items in the cartItems object.
     * 
     * Call saveToSession
     * 
     * IF More then 0 items in cartItems object.
     *  Call session put to save cartItems object to the cart object in the session.
     * IF 0 items in cartItems object.
     *  Call session forget to remove the cart object from the session.
     */

    public function saveToSession(Request $request){
        if(count($this->cartItems) > 0){
            $request->session()->put('cart', $this);
        } else {
            $request->session()->forget('cart');
        }
    }

    /**
     * Add product to cart object and increase the quantity by 1 if product already exists.
     * 
     * Call addToCart
     * 
     * @param $product
     * 
     * Call session put to add product to the cart object.
     */

    public function addToCart($product){ 
        $productId = $product->id;

        $cartItem = null;
        
        if (array_key_exists($productId, $this->cartItems)) {
            $cartItem = $this->cartItems[$productId];
            $cartItem->increaseQtyByOne();
        }else {
            $cartItem = new CartItem($product);
        }

        $this->cartItems[$productId] = $cartItem;
        $this->totalQty++;
        $this->totalPrice += $product->price;

        session()->put('cart', $this);
    }

    /**
     * Reduce the qty of the product by 1 in cart.
     * 
     * Call reduceByOneInCart
     * 
     * @param $product
     * 
     * Call save to session to reduce the qty by 1 in the cart object.
     */

    public function reduceByOneInCart($product){
        $productId = $product->id;

        $cartItem = $this->cartItems[$productId];
        $cartItem->decreaseQtyByOne();
        if ($cartItem->getQty() <= 0) {
            unset($this->cartItems[$productId]);
        }else{
            $this->cartItems[$productId] = $cartItem;
        }
        
        $this->totalQty--;
        $this->totalPrice -= $product->price;

        $this->saveToSession();
    }

    /**
     * Remove product form cart.
     * 
     * Call removeAllFromCart
     * 
     * @param $product
     * 
     * Call save to session function to remove product from cart object.
     */
     
    public function removeFromCart($product){
        $productId = $product->id;

        $cartItem = $this->cartItems[$productId];

        $this->totalQty -= $cartItem->getQty();
        $this->totalPrice -= $cartItem->getPrice();
        unset($this->cartItems[$productId]);
        $this->saveToSession();
    }
}