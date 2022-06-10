<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function confirmOrder(Request $request){
        Auth::check();
        $userId = Auth::id();

        Order::createOrder($userId, $request);

        $this->getCurrentUserOrders();
    }

    public function getCurrentUserOrders(){
        Auth::check();
        $userId = Auth::id();

        $orders = Order::where('user_id', $userId)->get();

        return view('orders', ['orders' => $orders]);
    }
}
