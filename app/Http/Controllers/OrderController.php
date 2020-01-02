<?php


namespace App\Http\Controllers;


use App\Client;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(int $clientId)
    {
        $client = Client::find($clientId);
        $orders = $client->orders;

        return view('order.index', compact('client', 'orders'));
    }
}
