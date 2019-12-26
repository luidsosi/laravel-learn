<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientFormRequest;
use Illuminate\Database\Schema\Blueprint;
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

    public function store(ClientFormRequest $request)
    {
        $newClient = Client::create([
            'name' => $request->nome
        ]);

        $quantidadePedidos = $request->qtd_pedidos;
        $quantidadeitensPedido = $request->qtd_itens_pedido;

        for ($i = 1; $i <= $quantidadePedidos; $i++) {
            $newOrder = $newClient->orders()->create(['idClient' => $newClient->id, 'valueTotal' => $i]);

            for ($j = 1; $j <= $quantidadeitensPedido; $j++) {
                $newOrderItem = $newOrder->orderItems()->create([
                    'idOrder' => $newOrder->id,
                    'item' => $j,
                    'price' => $j,
                    'quantity' => $i,
                    'total' => $i * $j
                ]);
            }
        }

        $request->session()->flash('message', "O novo cliente {$newClient->name} foi inserido com sucesso!");

        return redirect('/client');
    }

    public function delete(Request $request)
    {
        Client::destroy($request->id);
        $request->session()->flash('message', "O cliente foi removido com sucesso!");
        return redirect('/client');
    }
}
