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

    public function saveToSession(){
        if(count($this->cartItems) > 0){
            session()->put('cart', $this);
        } else {
            session()->forget('cart');
        }
    }

    /**
     * Call addToCart
     * 
     * @param $product
     * @param int $id
     * 
     * Call session put to add product to the cart object
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
     * 
     * 
     * @param int $id
     * 
     * Call save to session function to update the session.
     */
     
    public function removeAllFromCart($product){
        $product_id = $product->id;

        $cartItem = $this->cartItems[$product_id];

        $this->totalQty -= $cartItem->getQty();
        $this->totalPrice -= $cartItem->getPrice();
        unset($this->cartItems[$product_id]);
        $this->saveToSession();
    }
}