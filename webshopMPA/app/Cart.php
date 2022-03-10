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

        $this->saveToSession();
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

    public function saveToSession(){
        if(count($this->cartItems) > 0){
            session()->put('cart', $this);
        } else {
            session()->forget('cart');
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
        $product_id = $product->id;

        $cartItem = null;
        
        if (array_key_exists($product_id, $this->cartItems)) {
            $cartItem = $this->cartItems[$product_id];
            $cartItem->increaseQtyByOne();
        }else {
            $cartItem = new CartItem($product);
        }

        $this->cartItems[$product_id] = $cartItem;
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
        $product_id = $product->id;

        $cartItem = $this->cartItems[$product_id];
        $cartItem->decreaseQtyByOne();
        if ($cartItem->getQty() <= 0) {
            unset($this->cartItems[$product_id]);
        }else{
            $this->cartItems[$product_id] = $cartItem;
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
        $product_id = $product->id;

        $cartItem = $this->cartItems[$product_id];

        $this->totalQty -= $cartItem->getQty();
        $this->totalPrice -= $cartItem->getPrice();
        unset($this->cartItems[$product_id]);
        $this->saveToSession();
    }
}