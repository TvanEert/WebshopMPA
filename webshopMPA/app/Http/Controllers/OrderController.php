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

        $order = new Order();
        $order->createOrder($userId, $request);

        return view('home');
    }
}
