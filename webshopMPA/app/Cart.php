<?php

namespace App;

use Illuminate\Http\Request;

class Cart
{
    public $products = [];
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
        $storedProduct = ['qty' => 0, 'price' => $product[0]->price, 'product' => $product];
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $storedProduct = $this->products[$id];
            }
        }
        $storedProduct['qty']++;
        $storedProduct['price'] = $product[0]->price * $storedProduct['qty'];
        $this->products[$id] = $storedProduct;
        $this->totalQty++;
        $this->totalPrice += $product[0]->price;

        session()->put('cart', $this);
    }

    public function removeFromCart(){

    }
}