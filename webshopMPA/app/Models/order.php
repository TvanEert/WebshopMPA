<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(){
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('ordered_amount');
    }

    public function createOrder($userId, $request){
        $cart = $request->session()->get('cart');
        $totalOrdedProducts = $cart->totalQty;
        $totalPrice = $cart->totalPrice;

        $this->insert([
            'user_id' => $userId,
            'total_orded_products' => $totalOrdedProducts,
            'total_price' => $totalPrice
        ]);

        $order = $this::all()->where('user_id', $userId)->last();

        $orderId = $order->id;

        $orderProduct = new OrderProduct();
        
        foreach ($cart->cartItems as $cartItem)
            $orderProduct->insert([
                'order_id' => $orderId,
                'product_id' => $cartItem->product->id,
                'ordered_amount' => $cartItem->getQty()
            ]);
        
        $request->session()->forget('cart');
    }
}
