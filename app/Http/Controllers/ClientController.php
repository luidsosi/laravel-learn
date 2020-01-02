<?php

namespace App\Http\Controllers;

use App\Client;
use App\Dao\ClientDao;
use App\Http\Requests\ClientFormRequest;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::query()->orderBy('name')->get();

        return view('client.index', ['clients' => $clients, 'message' => $request->session()->get('message')]);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(ClientFormRequest $request, ClientDao $clientDao)
    {
        $newClient = $clientDao->create($request->nome, $request->qtd_pedidos, $request->qtd_itens_pedido);

        $request->session()->flash('message', "O novo cliente {$newClient->name} foi inserido com sucesso!");

        return redirect('/client');
    }

    public function delete(Request $request)
    {
        $client = Client::find($request->id);
        $client->orders->each(function (Order $order) {
            $order->orderItems->each(function (OrderItem $orderItem) {
                $orderItem->delete();
            });
            $order->delete();
        });
        $client->delete();
        $request->session()->flash('message', "O cliente $client->name foi removido com sucesso!");
        return redirect('/client');
    }
}
