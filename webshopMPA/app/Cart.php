<?php

namespace App;

class Cart
{
    public $products = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->products = $oldCart->prducts;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addToCart(){

    }

    public function removeFromCart(){

    }
}