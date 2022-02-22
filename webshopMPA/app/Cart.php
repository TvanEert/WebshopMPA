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

    /**
     * Call removeAllFromCart
     * 
     * @param int $id
     * 
     * Call save to update session
     */
     
    public function removeAllFromCart($id){
        $this->totalQty -= $this->products[$id] ['qty'];
        $this->totalprice -= $this->products[$id] ['price'];
        unset($this->products[$id]);
        $this->saveToSession();
    }

    public function reduceByOneInCart($id){
        $this->products[$id]['qty']--;
        $this->products[$id]['price'] -= $this->products[$id]['product']['price'];
        $this->totalQty--;
        $this->totalprice -= $this->products[$id]['product']['price'];

        if ($this->products[$id]['qty'] <= 0) {
            unset($this->products[$id]);
        }

        $this->saveToSession();
    }
}