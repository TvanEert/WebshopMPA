<?php

namespace App;

class CartItem{
    private $qty;
    private $price;
    public $product;

    public function __construct($product){
        $this->qty = 1;
        $this->price = $product->price;
        $this->product = $product;
    }

    /**
     * this function increases the current quantity by one and sets the price.
     */
    public function increaseQtyByOne(){
        $this->qty = $this->qty + 1;
        $this->price = $this->qty * $this->product->price;
    }

    public function decreaseQtyByOne(){
        $this->qty = $this->qty - 1;
        $this->price = $this->qty * $this->product->price;
    }

    public function getQty(){
        return $this->qty;
    }
}