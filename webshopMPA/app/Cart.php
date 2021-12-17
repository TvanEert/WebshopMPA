<?php

namespace App;

class Cart
{
    public $products = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct(Request $request){
        $oldcart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        if($oldcart){
            $this->products = $oldcart->products;
            $this->totalQty = $oldcart->totalQty;
            $this->totalPrice = $oldcart->totalPrice;
        }  

        $this->save();
    }

    public function save(){
        if(count($this->products) > 0){
            session()->put('cart', $this);
        } else {
            session()->forget('cart');
        }
    }

    public function addToCart($product, $id){ 
        $storedProducts = ['qty' => 0, 'price' => $product->price, 'product' => $product];
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $storedProducts = $this->products[$id];
            }
        }
        $storedProducts['qty']++;
        $storedProducts['price'] = $product->price * $storedProducts['qty'];
        $this->products[$id] = $storedProducts;
        $this->totalQty++;
        $this->totalPrice += $product->price;
    }

    public function removeFromCart(){

    }
}