<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use function foo\func;

class OrderItemController extends Controller
{
    public function index(Order $order)
    {
        $orderItems = $order->orderItems;

        return view('orderItem.index', compact('order', 'orderItems'));
    }

    public function check(Order $order, Request $request)
    {
        $orderItemsChecked = $request->orderItems;

        $order->orderItems->each(function (OrderItem $item) use ($orderItemsChecked){
            $item->checked = in_array($item->id, $orderItemsChecked);
        });

        $order->push();

        return redirect()->back();
    }
}
