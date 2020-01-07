<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index(Order $order)
    {
        $orderItems = $order->orderItems;

        return view('orderItem.index', compact('order', 'orderItems'));
    }
}
